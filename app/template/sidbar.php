<!-- start sidbar -->
<div class="col-lg-3" style="float:left;position: fixed;top: 50;right: 0;left: 0;z-index: 1030;">
    <aside>
        <div class="list-group">
            <div class="list-group-item" style="text-align:center">
                <img src="/images/avatar/avatar1.jpg" style="width:30%;border-radius:50%;">
                <p><a href="" class="list-group-item" style="padding:2px"><i class="fa fa-users"></i>  Mohamed Elfert  </a></p>
                <p class="list-group-item" style="padding:1px"><i class="fa fa-eye"></i>  <?= @$text_app_manager ?>  </p>
            </div>
        </div>
    </aside>

    <hr>

    <aside>
        <div class="list-group text-right">
            <a href="/" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i>  <?= @$text_general_statistics ?>  </a>
            <a href="/employees" class="list-group-item"><i class="fa fa-users"></i>  <?= @$text_sidbar_employees ?>  </a>
            <a href="/language" class="list-group-item"><i class="fa fa-language"></i>  <?= @$text_change_language ?>  </a>
            <a href="/auth/logout" class="list-group-item"><i class="fa fa-star"></i> <?= @$text_log_out ?> </a>
        </div>
    </aside>
</div>
<!-- end sidbar -->

<!-- Start Content -->
<div class="action_view col-lg-9 text-right" style="float:left; width:70%">