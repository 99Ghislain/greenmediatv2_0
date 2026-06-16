<div class="career_box">
    <h3 class="text-site-blue mb-5 title_elmt">Candidature </h3>
    <form id="form_carriere" class="form_carriere" enctype="multipart/form-data" method="post" action="#">
        <div class="row">
            <p class="col-md-12 mb-4">
                <label>Nom <span class="text-danger">*</span></label>
                <span class="form-group form-control-wrap your-name">
                    <input type="text" name="nom" id="nom" class="form-control" size="40" placeholder="Nom">
                </span>
            </p>
            <p class="col-md-12 mb-4">
                <label>Prénom <span class="text-danger">*</span></label>
                <span class="form-group form-control-wrap your-name">
                    <input type="text" name="prenom" id="prenom" class="form-control" size="40" placeholder="Prénom">
                </span>
            </p>
            <p class="col-md-12 mb-4">
                <label>E-mail <span class="text-danger">*</span></label>
                <span class="form-group form-control-wrap your-email">
                    <input type="email" name="email" id="email" class="form-control" required="" placeholder="E-mail">
                </span>
            </p>
            <div class="col-md-12 mb-4">
                <div class="carreer_cv">
                    <label>Curriculum Vitae <span class="text-danger">*</span></label>
                    <span class="form-group form-control-wrap your-cv">
                        <input type="file" name="cv" id="cv" accept=".pdf" required="">
                    </span>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="carreer_cv">
                    <label>Lettre de motivation <span class="text-danger">*</span></label>
                    <span class="form-group form-control-wrap your-letter">
                        <input type="file" name="motivation" id="motivation" accept=".pdf" required="">
                    </span>
                </div>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeN4hMcAAAAAHOaoQi3hnyNpR7mEB1qIYhJrzbE" data-theme="light" data-type="image" data-size="normal" ></div>                                    
            <script type="text/javascript" src="../www.google.com/recaptcha/apic69f.js?render=onload&amp;hl=fr" async defer></script>                                    
            <div class="col-md-12"><button type="submit" class="btn_simple_icone" name="ok"><span>Envoyer ma candidature <i class="fa fa-arrow-right"></i></span></button></div>
        </div>
    </form> 
</div>