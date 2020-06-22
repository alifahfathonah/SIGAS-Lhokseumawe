                              <?php
                              	include 'head.php' ;
                                include 'connect.php';
                              	$id = $_GET['id'];
                              	$data = mysql_query("SELECT * from pemilik inner join kios where pemilik.id_pemilik=kios.id_pemilik and pemilik.id_pemilik='$id'");





                                                    mysql_query("UPDATE pemilik set status='1' WHERE id_pemilik='$id'");
                                                                //  header("location:login.php");
                                                    echo "<script language='javascript'>
                                                          setTimeout(function () {
                                                            swal({
                                                                title: 'Selamat!',
                                                                text:  'Verifikasi Kios Sukses',
                                                                type: 'success',
                                                                timer: 3000,
                                                                showConfirmButton: false
                                                            });
                                                          },10);

                                                    window.setTimeout(function(){
                                                      window.location.replace('p-data-kios-lpg-unverified.php');
                                                    } ,3000);
                                                          </script>";

                                ?>
