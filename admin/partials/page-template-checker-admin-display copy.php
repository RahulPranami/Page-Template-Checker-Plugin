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

<div class="bg-nord-3">
    <p class="text-nord-5">Hello, this is some text</p>
</div>

    <!-- <div class="bg-buffy">
        <p class="text-nosferatu ">I vant to suck your blood...</p>
    </div> -->

    <div class="grid w-full gap-4" id="v0-nav">
        <div class="mb-4 border rounded-lg px-4 py-1 text-sm border-gray-800p-4 dark:border-gray-800">
            <ul class="flex flex-wrap items-center justify-center rounded-lg bg-gray-800 p-1 text-white gap-4" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="mx-2 active">
                    <button class="capitalize active-btn bg-dracula-background text-dracula-foreground" id="page-templates-tab" data-tabs-target="#page-templates" type="button" role="tab" aria-controls="page-templates" aria-selected="false">
                        Page Templates </button>
                </li>
                <!-- More buttons -->
            </ul>

            <ul class="flex flex-wrap items-center justify-center rounded-lg bg-gray-800 p-1 text-white gap-4" id="default-tab" role="tablist">
                <li class="mx-2">
                    <button class="capitalize p-4 border-b-2 rounded-t-lg inactive" id="page-templates-tab" type="button" role="tab" aria-controls="page-templates" aria-selected="false">
                        Page Templates </button>
                </li>
                <!-- More buttons -->
            </ul>

        </div>
    </div>
    <!-- More divs -->
    <div id="default-tab-content" class="container mx-auto">
        <div class="tab-content" id="page-templates" role="tabpanel" aria-labelledby="page-templates-tab">
            <div class="container bg-dracula-background text-dracula-foreground p-4">
                <!-- More divs -->
                <div class="rounded-md border border-dracula-purple p-2 my-2 pb-4">
                    <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
                        <h4 class="float-left text-xl">
                            No intro ( <span class="px-2">
                                custom-no-intro </span> )
                        </h4>
                        <!-- More divs -->
                    </div>
                    <!-- More divs -->
                </div>
                <!-- More divs -->
            </div>
        </div>
        <!-- More divs -->
    </div>
</div>

<div class="wrap">

    <div class="grid w-full gap-4" id="v0-nav">
        <div class="mb-4 border rounded-lg px-4 py-1 text-sm border-gray-800p-4 dark:border-gray-800">
            <ul class="flex flex-wrap items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground gap-4" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                <?php foreach ($tabs as $tab_title => $tab) : ?>
                    <li class="mx-2 <?php echo 'page-templates' === $tab ? 'active' : ''; ?>">
                        <button class="capitalize <?php echo 'page-templates' === $tab ? 'active-btn' : ''; ?>" id="<?php echo $tab; ?>-tab" data-tabs-target="#<?php echo $tab; ?>" type="button" role="tab" aria-controls="<?php echo $tab; ?>" aria-selected="<?php echo $tab === 0 ? 'true' : 'false' ?>">
                            <?php echo $tab_title; ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php
    require_once plugin_dir_path(__FILE__) . 'parts/header.php';
    ?>

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
