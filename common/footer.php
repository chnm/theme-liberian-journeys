        </div><!-- end-main -->

        </article>

        <footer>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
                <p>Please <a href="<?php echo url('contact'); ?>">contact us</a> with any questions or comments.</p>
            </div>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>

    </div><!-- end wrap -->
</body>
</html>
