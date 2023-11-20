<?php if(count($cart) > 0){ ?>
<table id="" width="100%" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                          <th> product_code  </th> 
                                          <th> product_name  </th> 
                                          <th> dimention  </th> 
                                          <th> price  </th> 
                                          <th> discount  </th> 
                                          <th> unit  </th> 
                                          <th> qty  </th> 
                                          <th> harga  </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cart as $key => $value) { ?>
                                    <tr>
                                          <td> <?= $value->product_code ?>  </td> 
                                          <td> <?= $value->product_name ?>  </td> 
                                          <td> <?= $value->dimention ?>  </td> 
                                          <td>  <?= $value->currency ?> <?= $value->price ?>  </td> 
                                          <td> <?= $value->discount ?> % </td> 
                                          <td> <?= $value->unit ?>  </td> 
                                          <td> <?= $value->qty ?>  </td> 
                                          <?php $diskon = ($value->price*$value->discount/100)?>
                                          <td> <?= $value->currency ?> <?= ($value->price-$diskon)*$value->qty ?> </td> 
                                        
                                </tr>
                                <?php }?>
                                </tbody>
                               
                            </table>

                            <button onclick="beli()">Beli</button>
<?php }else{
    echo "Cart Kosong";
} ?>