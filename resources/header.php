<div id="<?php echo 'header-' . PAGE_PATH; ?>">
    <div class="hero">
        <!--        dynamic-->
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
                    <li>
                        <a href="/about"> About </a>
                    </li>
                    <li>
                        <a href="/destination"> Destination </a>
                    </li>
                    <li>
                        <a href="/activities"> Activities </a>
                    </li>
                    <li>
                        <a href="/planning"> Planning </a>
                    </li>
                    <li>
                        <a href="/gallery"> Gallery </a>
                    </li>
                    <li>
                        <a href="/contact"> Contact </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex-spacer"></div>
        <div class="hero-title center-children">
            <h1 class="primary-light">
                <?php hero_title(); ?>
            </h1>
            <!--SVG image of Alaska-->
        </div>
        <div class="call-button center-inline wrapper">
            <?php call_button(); ?>
        </div>
        <div class="flex-spacer"></div>
    </div>
</div>
