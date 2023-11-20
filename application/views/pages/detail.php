<?php if(count($detail) > 0){ ?>
<table id="" width="100%" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                          <th> product_code  </th> 
                                          <th> product_name  </th> 
                                          <th> dimention  </th> 
                                          <th> price  </th> 
                                          <th> discount  </th> 
                                          <th> Qty  </th> 
                                          <th> harga  </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($detail as $key => $value) { ?>
                                    <tr>
                                          <td> <?= $value->product_code ?>  </td> 
                                          <td> <?= $value->product_name ?>  </td> 
                                          <td> <?= $value->dimention ?>  </td> 
                                          <td> <?= $value->currency ?>  <?= $value->price ?>  </td> 
                                          <td> <?= $value->discount ?> % </td> 
                                          <td> <?= $value->qty ?> <?= $value->unit ?>  </td> 
                                          <?php $diskon = ($value->price*$value->discount/100)?>
                                          <td> <?= $value->currency ?> <?= ($value->price-$diskon)*$value->qty ?> </td> 
                                          <td> </td> 
                                </tr>
                                <?php }?>
                                </tbody>
                               
                            </table>

<?php }else{
    echo "detail Kosong";
} ?>