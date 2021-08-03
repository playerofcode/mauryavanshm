 <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center bg-warning text-white">
                All Rights Reserved by CMJKYPPA. Designed and Developed by <a href="http://paniniayurveda.com">Panini Ayurveda</a>
            </footer>
        </div>
    </div>
    <!--Order Item in Model-->

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Customer Order Item(s) Details</h4>
      </div>
      <div class="modal-body" id="order_item_details">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var eb_cid=document.getElementById('eb_cid');
        if(eb_cid){
          eb_cid.addEventListener("change",() =>{
                 eb_cid= document.getElementById('eb_cid').value;
                var eb_scid=document.getElementById('eb_scid');
                $.ajax({
                    url:"<?php echo base_url('admin/fetchEBSubCategory');?>",
                    method:"post",
                    data:{eb_cid:eb_cid},
                    success:function(data)
                    {
                        console.log(data);
                        eb_scid.innerHTML=data;
                    }
                })
            });  
        }
         var eb_scid=document.getElementById('eb_scid');
         if(eb_scid)
         {
            eb_scid.addEventListener("change",()=>{
                eb_scid= document.getElementById('eb_scid').value;
                var eb_did=document.getElementById('eb_did');
                $.ajax({
                    url:"<?php echo base_url('admin/fetchEBDesignation');?>",
                    method:"post",
                    data:{eb_scid:eb_scid},
                    success:function(data)
                    {
                        eb_did.innerHTML=data;
                    },
                    error:function(error)
                    {
                        console.log(error);
                    }
                })
            });
         }
            var country_id=document.getElementById('country_id');
            if(country_id){
                country_id.addEventListener("change", () =>{
                 country_id= document.getElementById('country_id').value;
                var state_id=document.getElementById('state_id');
                $.ajax({
                    url:"<?php echo base_url('admin/fetchState');?>",
                    method:"post",
                    data:{country_id:country_id},
                    success:function(data)
                    {
                        state_id.innerHTML=data;
                    }
                })
            });
            }
            
            var state_id=document.getElementById('state_id');
            if(state_id)
            {
                 state_id.addEventListener("change",() =>{
                 state_id=document.getElementById('state_id').value;
                var district_id=document.getElementById('district_id');
                $.ajax({
                    url:"<?php echo base_url('admin/fetchDistrict');?>",
                    method:"post",
                    data:{state_id:state_id},
                    success:function(data)
                    {
                        district_id.innerHTML=data;
                    }
                })
             });
            }
            var district_id=document.getElementById('district_id');
            if(district_id)
            {
                 district_id.addEventListener("change",() =>{
                 district_id=document.getElementById('district_id').value;
                var block_id=document.getElementById('block_id');
                $.ajax({
                    url:"<?php echo base_url('admin/fetchBlock');?>",
                    method:"post",
                    data:{district_id:district_id},
                    success:function(data)
                    {
                        block_id.innerHTML=data;
                    }
                })
            });
            }
            // var tehsil_id=document.getElementById('tehsil_id');
            // if(tehsil_id)
            // {
            //      tehsil_id.addEventListener("change",() =>{
            //      tehsil_id=document.getElementById('tehsil_id').value;
            //      var block_id=document.getElementById('block_id');
            //     $.ajax({
            //         url:"<?php echo base_url('admin/fetchBlock');?>",
            //         method:"post",
            //         data:{tehsil_id:tehsil_id},
            //         success:function(data)
            //         {
            //             block_id.innerHTML=data;
            //         }
            //     })
            // });
            // }
    </script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/chart/chart-page-init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>dist/js/pages/mask/mask.init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/libs/quill/dist/quill.min.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo base_url('assets/admin/'); ?>assets/extra-libs/DataTables/datatables.min.js"></script>
    
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
</body>

</html>