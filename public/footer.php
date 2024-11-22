<!-- Back to Top -->
<div class="col-12 text-end">
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="fa fa-angle-double-up back-to-top-icon"></i>
    </a>
</div>

<footer>
    <div class="container">
        <div class="footerInner">
            <div class="ImgWrap"><img src="<?= SEOURL; ?>assets/front/images/enhi.jpg" class="img-fluid" style="width:145px;">
            </div>
            <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `footer_ID`, `footer_title`, `footer_title_hindi`, `footer_content`, `footer_content_hindi`, `status` FROM `footer` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $footer_ID = $row["footer_ID"];
                $footer_title = $row["footer_title"];
                $footer_title_hindi = $row["footer_title_hindi"];
                $footer_content = html_entity_decode($row["footer_content"]);
                $footer_content_hindi = html_entity_decode($row["footer_content_hindi"]);
            ?>
                <div><?php if ($get_configured_lang == 'HI') :
                            echo  $footer_content_hindi;
                        else :
                            echo  $footer_content;
                        endif; ?></div>
            <?php endwhile; ?>
        </div>
    </div>
</footer>

<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/bootstrap-v5-0-2.min.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/functions.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/swiper-bundle.min.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/fancybox.min.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/customScroll.js"></script>
<script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/general.js"></script>

<script src="<?= SEOURL; ?>assets/plugins/jsencrypt.min.js"></script>
<script src="<?= SEOURL; ?>assets/plugins/emailvalidate.js"></script>

<script type="text/javascript">
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
        const togglescrollTop = function() {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
        window.addEventListener('load', togglescrollTop);
        document.addEventListener('scroll', togglescrollTop);
        scrollTop.addEventListener('click', window.scrollTo({
            top: 0,
            behavior: 'smooth'
        }));
    }
</script>
<script type="text/javascript">
    $('#exampleModal').on('hidden.bs.modal', function(e) {
        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();

        $('#exampleModal').bootstrapValidator('resetForm', true);
    });

    function refreshcaptcha() {
        time = Date.now();
        document.getElementById('captcha').src = '/admin/ajax/generateCaptcha?' + time;
    }

    $(document).ready(function() {

        $('#occupation').change(function() {
            if ($('#occupation').val() == 'Others, please specify') {
                $('#userdownloads_otherocc_field').show();
            } else {
                $('#userdownloads_otherocc_field').hide();
            }
        });

        $('#frmuserdownloads').bootstrapValidator().on('success.form.bv', function(e) {
            e.preventDefault();

            submitRegistrationForm();
            //var content = $('#pwd').val();
            //var encrypt = new JSEncrypt();
            //encrypt.setKey(publicKey);
            //var encoded = encrypt.encrypt(content);
            //document.frmlogin.action = "/login";
            //document.getElementById('frmuserdownloads').submit();
        });
    });

    $(".registrationandDownloaddoc").click(function() {
        $("#documentfile_name").remove();
        $("#documentfile_modulename").remove();
        $('#frmuserdownloads').append(
            "<input type='hidden' name='documentfile' id='documentfile_name' value='" + $(this).attr(
                "data-documentfile") + "' />");
        $('#frmuserdownloads').append(
            "<input type='hidden' name='documentmodulename' id='documentfile_modulename' value='" + $(this)
            .attr("data-modulename") + "' />");
        //console.log($(this).attr("data-documentid"));
        download_id = $(this).attr("data-documentid");
    });

    function submitRegistrationForm() {
        var setpath = $(location).attr('hostname');
        /*if(setpath == 'SIDBI.in')
        {
            var redurl = 'http://SIDBI.in/';
        }
        else{
            var redurl = 'http://www.SIDBI.in/';
        }*/

        var registrationData = $('#frmuserdownloads').serializeArray();
        registrationData.push({
            name: 'download_id',
            value: download_id
        });
        var para = download_id.split('_');
        if (para[3] == 'Structural') {
            //var redirect = redurl+'en/Articles/download/'+para[1]+'/'+para[2]+'/'+para[3];
            var redirect = 'index';
        } else {
            if (!para[4]) {
                var redirect = '/publication-and-reports-download';
                //var redirect = redurl+'en/PublicationAndReports/download/'+para[1]+'/'+para[2]+'/'+para[3];
            } else {
                var redirect = '/publication-and-reports-download';
                //var redirect = redurl+'en/PublicationAndReports/download/'+para[1]+'/'+para[2]+'/'+para[3]+'/'+para[4];
            }
        }

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-Token': $('[name="_csrfToken"]').val()
            },
            url: redirect,
            data: registrationData,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == 'success') {
                    alert(response.message);
                    $("#exampleModal").modal('hide');
                    window.location.reload();
                } else {
                    alert(response.message);
                }
            }
        });
        // }
    }
</script>



<section class="copyRight">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <p class="text-black mb-0 text-center"><?php if ($get_configured_lang == 'HI') :
                                                            echo  'कॉपीराइट © 2023 लघु उद्योग विकास बैंक
                                                 भारत (सिडबी)। सभी
                                                 अधिकार
                                                 आरक्षित';
                                                        else :
                                                            echo  'Copyright &copy; ' . date('Y') . ' Small Industries Development Bank of
                                                 India(SIDBI). All
                                                 rights
                                                 reserved';
                                                        endif; ?></p>
            </div>
            <!-- <div class="col-md-3 text-end d-xl-block">
                    <p class="text-black mb-0">Designed by Touchmark Descience Pvt Ltd</p>
                </div> -->
        </div>
    </div>
</section>