<div id="<?php echo 'header-' . PAGE_PATH; ?>">
    <div class="hero">
        <div class="hero-image"> </div>
        <div class="hero-overlay"> </div>
    </div>
    <div class="flex-container-col">
        <div class="flex-container-row wrapper">
            <div class="logo">
                <a href="/">LAMBERT WILDERNESS</a>
            </div>
            <div class="flex-spacer"></div>
            <div class="nav-header">
                <ul class="flex-container-row">
                    <?php add_nav_list();?>
                </ul>
            </div>
        </div>
        <div class="flex-spacer"></div>
        <div class="hero-text center-children">
            <h1 class="primary-light">
                <?php add_hero_text(); ?>
            </h1>
            <!--SVG image of Alaska-->
        </div>
        <div class="call-button center-inline wrapper">
            <?php add_call_button(); ?>
        </div>
        <div class="flex-spacer"></div>
    </div>
</div>
