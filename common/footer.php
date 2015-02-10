        </div><!-- end-main -->

        </article>

        <footer>

            <div id="footer-text">
                <?php echo get_theme_option('Footer Text'); ?>
            </div>

            <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

        </footer>

    </div><!-- end wrap -->
</body>
</html>
