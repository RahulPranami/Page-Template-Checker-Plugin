<div class="container">
    <h1 class="text-center text-xl font-bold">Page Template Usage Report</h1>

    <?php $templates = wp_get_theme()->get_page_templates(); ?>

    <!-- Loop Start -->
    <?php
    foreach ($templates as $file => $name) :
        $q = new WP_Query([
            'post_type' => 'page',
            'posts_per_page' => -1,
            'meta_query' => [[
                'key' => '_wp_page_template',
                'value' => $file
            ]]
        ]);

        $page_count = sizeof($q->posts);

    ?>
        <div class="rounded-md border border-slate-800 p-2 my-2 pb-4">
            <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
                <h4 class="float-left text-xl">
                    <?php echo $name; ?>
                    ( <span class="px-2">
                        <?php echo $file; ?>
                    </span> )
                </h4>
                <p class="float-right <?php echo ($page_count > 0) ? 'text-mantis-700' : 'text-cerise-red-700'; ?>">
                    <strong class="px-2">
                        ( <span class="px-2">
                            <?php echo $page_count; ?>
                        </span> )
                    </strong>
                    pages are using this template
                </p>
            </div>

            <?php if ($page_count > 0) : ?>
                <ul class="list-none pl-5">
                    <?php foreach ($q->posts as $p) : ?>
                        <li>
                            <a href="<?php echo get_permalink($p, false); ?>" class="text-base text-blue-chill-800 hover:text-blue-chill-500">
                                <?php echo $p->post_title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <div class="pl-5 text-base text-rose-of-sharon-700">
                    There Are No Pages Using This Template, you should be able to safely delete it from your theme.
                </div>
            <?php endif; ?>

        </div>


    <?php endforeach; ?>
    <!-- Loop End -->
</div>
