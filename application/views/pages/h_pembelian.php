<table id="" width="100%" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    
                                        <th> trans_code </th>
                                        <th> total_price </th>
                                        <th> Opsi  </th> 

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($trans as $key => $value) { ?>
                                    <tr>
                                          <td> <?= $value->trans_code ?>  </td> 
                                          <td> IDR <?= $value->total_price ?>  </td> 
                                          <td> <button onclick="show_history_detail('<?= $value->trans_code ?>')">Detail</button> <td>
                                             
                                </tr>
                                <?php }?>
                                </tbody>
                               
                            </table>
