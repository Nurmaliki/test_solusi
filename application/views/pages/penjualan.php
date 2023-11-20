<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                           
                            <div class="modal fade " id="modalDetail" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="judulModalDetail" class="modal-title">Detail Product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="show_detail">
                                          
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <!-- <button id="id_product" class="btn btn-primary">Add To Cart</button> -->
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="modal fade " id="modalDetailhistory" aria-modal="true" role="dialog">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 id="judulModal" class="modal-title">Detail Product</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="show_detail_history">
                                          
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <!-- <button id="id_product" class="btn btn-primary">Add To Cart</button> -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
       
                        <div class="card-body">
                            <table id="example1" width="100%" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                          <th> product_code  </th> 
                                          <th> product_name  </th> 
                                          <th> price  </th> 
                                          <th> currency  </th> 
                                          <th> discount  </th> 
                                          <th> dimention  </th> 
                                          <th> unit  </th> 
                                          <th> Opsi  </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($product as $key => $value) { ?>
                                    <tr>
                                          <td> <?= $value->product_code ?>  </td> 
                                          <td> <?= $value->product_name ?>  </td> 
                                          <td> <?= $value->price ?>  </td> 
                                          <td> <?= $value->currency ?>  </td> 
                                          <td> <?= $value->discount ?>  </td> 
                                          <td> <?= $value->dimention ?>  </td> 
                                          <td> <?= $value->unit ?>  </td> 
                                          <td>  <button 
data-id="<?= $value->id ?>"
data-product_code="<?= $value->product_code ?>"
data-product_name="<?= $value->product_name ?>"
data-price="<?= $value->price ?>"
data-currency="<?= $value->currency ?>"
data-discount="<?= $value->discount ?>"
data-dimention="<?= $value->dimention ?>"
data-unit="<?= $value->unit ?>"
onclick="detail(this)">Detail</button> </td> 
                                </tr>
                                <?php }?>
                                </tbody>
                               
                            </table>
                        </div>

                                    <hr>
                                    <h4>Cart</h4>
                        <div id="show_cart" class="card-body">
                           
                        </div>
                        <hr>
                                    <h4>History Pembelian</h4>
                        <div id="show_history" class="card-body">
                           
                           </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>