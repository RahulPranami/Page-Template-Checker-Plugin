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
$active_class = 'text-blue-600 border-b-2 border-blue-600 active';

?>

<div class="wrap">

    <div class="mb-4 border-b border-gray-700">
        <ul class="flex flex-wrap" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">

            <?php foreach ($tabs as $tab_title => $tab) : ?>
                <li class="">
                    <button class="capitalize py-2 px-4 hover:text-gray-900 <?php echo 'page-templates' === $tab ? $active_class : ''; ?>" id="<?php echo $tab; ?>-tab" data-tabs-target="#<?php echo $tab; ?>" type="button" role="tab" aria-controls="<?php echo $tab; ?>" aria-selected="<?php echo $tab === 0 ? 'true' : 'false' ?>">
                        <?php echo $tab_title; ?>
                    </button>
                </li>
            <?php endforeach; ?>

        </ul>
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
