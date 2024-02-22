<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://rahulpranami.co
 * @since      1.0.0
 *
 * @package    Page_Template_Checker
 * @subpackage Page_Template_Checker/admin/partials
 */

$tabs = ['Page Templates' => 'page-templates', 'Contact Forms' => 'contact-forms', 'Shortcode Search' => 'shortcode-search', 'Universal Search' => 'universal-search'];

$active_class = 'bg-dracula-purple text-white';

?>

<div class="wrap">

    <div class="grid w-full gap-4" id="v0-nav">
        <div class="mb-4 border rounded-lg px-4 py-1 text-sm border-gray-800p-4 dark:border-gray-800">
            <ul class="flex flex-wrap items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground gap-4" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <?php foreach ($tabs as $tab_title => $tab) : ?>
                    <li class="mx-2 p-4 border-b-2 rounded-tl-lg rounded-br-lg <?php echo 'page-templates' === $tab ? 'active' : 'inactive'; ?>">
                        <button class="capitalize <?php echo 'page-templates' === $tab ? 'active-btn' : ''; ?>" id="<?php echo $tab; ?>-tab" data-tabs-target="#<?php echo $tab; ?>" type="button" role="tab" aria-controls="<?php echo $tab; ?>" aria-selected="<?php echo $tab === 0 ? 'true' : 'false' ?>">
                            <?php echo $tab_title; ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Write tabbed navigateed block -->
    <div id="default-tab-content" class="container mx-auto">

        <?php foreach ($tabs as $tab_title => $tab) : ?>
            <div class="<?php echo 'page-templates' === $tab ? '' : 'hidden' ?> tab-content" id="<?php echo $tab; ?>" role="tabpanel" aria-labelledby="<?php echo $tab; ?>-tab">
                <?php
                if (file_exists(plugin_dir_path(__FILE__) . 'tab/' . $tab . '.php')) {
                    require_once plugin_dir_path(__FILE__) . 'tab/' . $tab . '.php';
                } else {
                    require plugin_dir_path(__FILE__) . 'tab/404.php';
                }
                ?>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- Write tabbed navigateed block -->

</div>
