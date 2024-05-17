<section class="newsletter">
    <div class="newsletter_container">
        <h3 class="d-title">Assine a newsletter da IT-ONE</h3>
        <p class="d-text">
            Seja o primeiro a receber insights exclusivos e dicas valiosas diretamente em seu e-mail.
        </p>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="hidden" name="action" value="submit_email_form">
            <input class="email" type="text" name="search" placeholder="seu e-mail" required>
            <button type="submit"><img
                    src="<?php echo get_stylesheet_directory_uri() ?>/dev/dist/res/img/assets/navigate_next-blue.svg"
                    alt=""> </button>
        </form>

    </div>
</section>