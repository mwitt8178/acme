<!-- Modal -->
<div class="modal fade" id="{{$mode}}-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@yield($as.'_modal_title')</h4>
            </div>
            <form action="<?php echo($action_url); ?>" method="post">
                <div class="modal-body">

                    @yield($as."_modal_body")

                </div>
                <div class="modal-footer">
                    @yield($as.'_modal_buttons')
                </div>
            </form>
        </div>
    </div>
</div>
