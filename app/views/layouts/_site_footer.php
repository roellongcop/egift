<?php
use app\models\AboutSearch;
$about = AboutSearch::information();
?>

<footer id="footer">
    <div class="inner">
        <div class="content">
            <section>
                <h3>our mission</h3>
                <p class="indent-justify">Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
            </section>
            <section>
                <h4>Browse</h4>
                <ul class="alt">
                    <li><a href="#">Frequently Ask Questions</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </section>
            <section>
                <h4>Keep in touch</h4>
                <ul class="plain">
                    <li><a href="<?= $about->twitter ?>"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                    <li><a href="<?= $about->facebook ?>"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                    <li><a href="<?= $about->instagram ?>"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                    <li><a href="<?= $about->yahoo ?>"><i class="icon fa-yahoo">&nbsp;</i>Yahoo</a></li>
                </ul>
            </section>
        </div>
        <div class="copyright">
        Egift Rewards &copy; <?= date('Y') ?></a>.
        </div>
    </div>
</footer>