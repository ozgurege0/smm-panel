<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Ödemeler</strong>
								<a href="havale" class="btn btn-success btn-sm float-right">Havale Ödemeleri<a>
                            </div>
                            <div class="table-responsive">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Numara</th>
                                            <th>Ödeme No</th>
                                            <th>Tutar</th>
                                            <th>Mesaj</th>
                                            <th>Durum</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $uyeler = $vt->cek('OBJ_ALL', 'odemeler', '*', 'ORDER BY id DESC', array());
                                            foreach($uyeler as $row){
                                                if($row->mesaj){
                                                    $mesaj = 'Onaylandı';
                                                }else{
                                                    $mesaj = $row->mesaj;
                                                }
                                                if($row->onay == "0"){
                                                    $durum = 'Başarılı';
                                                }else if($row->onay == "2"){
                                                    $durum = 'Hata';
                                                }
                                                $kadi = $vt->cek('ASSOC', 'uyeler', 'email,username', 'where email=?', array($row->uye_email));
                                            ?><tr>
                                            
                                            <td><?=$row->id?></td>
                                            <td><?=$kadi['username']?></td>
                                            <td><?=$row->uye_numara?></td>
                                            <td><?=$row->siparis_no?></td>
                                            <td><?=$row->tutar?> TL</td>
                                            <td><?=$mesaj?></td>
                                            <td><?=$durum?></td>
                                            <td><?=tarih($row->tarih)?></td>
                                        </tr><?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>