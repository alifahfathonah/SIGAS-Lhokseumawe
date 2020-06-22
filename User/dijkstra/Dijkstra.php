<?php
class Dijkstra
{
	function jalurTerpendek($arg_graph, $simpulAwal, $simpulTujuan){
		if($simpulAwal == $simpulTujuan){
			return json_encode(['status'=>'error','error'=>'lokasi_anda_sudah_dekat','teks'=>'Lokasi Anda Sudah Dekat','content'=>'']);
		}

		if(!array_key_exists($simpulAwal, $arg_graph) || !array_key_exists($simpulTujuan, $arg_graph)){
			return print_r(json_encode(['status'=>'error','error'=>'simpul_input_tidak_ditemukan','teks'=>"could not find the input : $simpulAwal or $simpulTujuan", 'content'=>'']));
		}

		$graph 		 	= $arg_graph;
  $simpul_awal 	= $simpulAwal;
  $simpul_maju 	= $simpulAwal;
$simpul_tujuan 	= $simpulTujuan;
	$jml_simpul 	= count($arg_graph);

		$simpulYangDikerjakan = array();
		$simpulYangSudahDikerjakan_bawah = array();
		$nilaiSimpulYgDitandai 		= 0;
		$nilaiSimpulFixYgDitandai 	= 0;


		// #HANDLE PERULANGAN
		// PERULANGAN INI TIDAK AKAN BERHENTI (--$perulangan;) SAMPAI ALGORITMA DIJKSTRA MENEMUKAN 1 JALUR TERPENDEK

		for($perulangan = 0; $perulangan < 1; $perulangan++)
		{
			// UNTUK MNDAPATKAN 1 BOBOT PALING MINIMUM DARI SETIAP SIMPUL
			$perbandinganSemuaBobot = array();

			// DAFTARKAN SIMPUL pertama YANG AKAN DIKERJAKAN KE DALAM ARRAY
			if(!in_array($simpul_maju, $simpulYangDikerjakan)){
				array_push($simpulYangDikerjakan, $simpul_maju);
			}


			for($perulanganSimpul = 0; $perulanganSimpul < count($simpulYangDikerjakan); $perulanganSimpul++)
			{
				// HITUNG JUMLAH BARIS PER KOLOM SIMPUL
				$jumlah_baris = count($graph[ $simpulYangDikerjakan[$perulanganSimpul] ]);

				// TAMPUNG BOBOT MINIMUM DARI SETIAP KOLOM SIMPUL BERDASARKAN BARIS SCR URUT[0][0],[0][1] DST
				$bobot_baris = array();

				// JUMLAH BARIS YANG BELUM DIKERJAKAN
				$baris_belum_dikerjakan = 0;


				for($start_baris = 0; $start_baris < $jumlah_baris; $start_baris++)
				{

					$ruas_dan_bobot = $graph[ $simpulYangDikerjakan[$perulanganSimpul] ][$start_baris];
					$explode = explode('->', $ruas_dan_bobot);

					if(count($explode) == 2)
					{
						$baris_belum_dikerjakan += 1;

						if(!empty($simpulYangSudahDikerjakan_bawah))
						{
							if(in_array($simpulYangDikerjakan[$perulanganSimpul], $simpulYangSudahDikerjakan_bawah)){
							   $nilaiSimpulYgDitandai = 0;
							}else{
							  $nilaiSimpulYgDitandai = $nilaiSimpulFixYgDitandai;
							}
						}
						array_push($bobot_baris, ($explode[1]+$nilaiSimpulYgDitandai));
						$graph[ $simpulYangDikerjakan[$perulanganSimpul] ][$start_baris] = $explode[0] . "->" . $explode[1] . $nilaiSimpulYgDitandai;
					}
				}


				// JIKA ADA BARIS DI KOLOM BELUM ->Y SEMUA, MAKA LAKUKAN IF DI BAWAH INI :
				if($baris_belum_dikerjakan > 0)
				{
					// DAPATKAN BOBOT MINIMUM
					for($index_bobot = 0; $index_bobot < count($bobot_baris); $index_bobot++){
					   if($bobot_baris[$index_bobot] <= $bobot_baris[0]){
						   $bobot_baris[0] = $bobot_baris[$index_bobot];
					   }
					}

					// BOBOT TERKECIL DARI SETIAP KOLOM SIMPUL
					array_push($perbandinganSemuaBobot, $bobot_baris[0]);

				}
				else{
				}

				// DAFTARKAN SIMPUL SIMPUL YANG baru selesai DIKERJAKAN
				if(!in_array($simpulYangDikerjakan[$perulanganSimpul], $simpulYangSudahDikerjakan_bawah)){
					array_push( $simpulYangSudahDikerjakan_bawah, $simpulYangDikerjakan[$perulanganSimpul] );
				}
			}// end for perulanganSimpul


			for($min_indexAntarBobotYgDitandai = 0; $min_indexAntarBobotYgDitandai < count($perbandinganSemuaBobot); $min_indexAntarBobotYgDitandai++)
			{
				if($perbandinganSemuaBobot[$min_indexAntarBobotYgDitandai] <= $perbandinganSemuaBobot[0]){
					$perbandinganSemuaBobot[0] = $perbandinganSemuaBobot[$min_indexAntarBobotYgDitandai];
				}
			}

			// DAPATKAN INDEX SIMPUL+BOBOTNYA YG ASLI DARI SIMPUL YG DITANDAI
			$indexAwalAsli 				= 0; // index simpulnya
			$baris_belum_dikerjakan1 	= 0;
			$dapat_indexAsliBobot 		= 0;
			$simpul_lama 				= 0;
			//$length_baris				= count($graph[$simpulYangDikerjakan[$indexAwalAsli]]);

			foreach($simpulYangDikerjakan as $idx => $v)
			{
				$length_baris = $graph[$simpulYangDikerjakan[$idx]];

				for($baris1 = 0; $baris1 < $length_baris; $baris1++)
				{
					if( isset($graph[ $simpulYangDikerjakan[$indexAwalAsli] ][$baris1]) )
					{
						$bobot_baris_dan_ruas1 = $graph[ $simpulYangDikerjakan[$indexAwalAsli] ][$baris1];
						$explode1 = array();
						$explode1 = explode('->', $bobot_baris_dan_ruas1);
						if(count($explode1) == 2)
						{
							if($perbandinganSemuaBobot[0] == $explode1[1])
							{
								$dapat_indexAsliBobot = $baris1;
								$simpul_lama = $simpulYangDikerjakan[$indexAwalAsli];
								$simpul_maju = $explode1[0];
								$baris_belum_dikerjakan1 += 1;
							}
						}// end if cek ->y atau ->t
					}// end if cek baris != null
					else{
						break;
					}
				}// end for limit baris = 100

				$indexAwalAsli++; // index simpul di tambah 1
			}// end for simpul yang dikerjakan


			// BULETIN BOBOT MINIMUM YANG UDH DIDAPAT dan HAPUS RUAS YANG BERHUBUNGAN
			if($baris_belum_dikerjakan1 > 0){
				$graph[$simpul_lama][$dapat_indexAsliBobot] = $graph[$simpul_lama][$dapat_indexAsliBobot] . "->y";

				// HAPUS RUAS LAIN
				for($min_kolom = 0; $min_kolom < $jml_simpul; $min_kolom++)
				{
					// JUMLAH BARIS PER KOLOM SIMPUL
					$length_baris1 = count($graph[$min_kolom]);

					for($min_baris = 0; $min_baris < $length_baris1; $min_baris++)
					{
						if(isset($graph[$min_kolom][$min_baris]))
						{
							$ruasYgAkanDihapus = $graph[$min_kolom][$min_baris];
							$explode3 = explode('->', $ruasYgAkanDihapus);
							if(count($explode3) == 2){
								if($explode3[0] == $simpul_maju){
									$graph[$min_kolom][$min_baris] = $graph[$min_kolom][$min_baris]+"->t";
								}
							}
						}
					}
				}
			}

			// ======================================================
			// # JIKA ALUR GRAPH ANDA SALAH, MAKA DIE() SAMPAI IF INI
			// ======================================================
			if(!isset($perbandinganSemuaBobot[0]))
				return json_encode(['status'=>'error', 'error'=>'alur_graph_anda_salah', 'teks'=>'Alur graph Anda Salah', 'content'=>'']);


			// NILAI * YG DITANDAI
			$nilaiSimpulFixYgDitandai = $perbandinganSemuaBobot[0];

			// LOOPING $perulangan lagi jika SIMPUL_MAJU != SIMPUL_TUJUAN
			if($simpul_maju != $simpul_tujuan){
			  --$perulangan;
			}
			else{
				break; // akhiri perulangan
			}
		}// end for handle perulangan



		// TARUH SIMPUL GABUNGAN KE ARRAY; MISAL : SIMPUL 6-10
		$gabungSimpulPilihan = array();
		for($h = 0; $h < $jml_simpul; $h++)
		{
			// JUMLAH BARIS PER KOLOM SIMPUL
			$length_baris2 = count($graph[$h]);

			for($n = 0; $n < $length_baris2; $n++)
			{
				if(isset($graph[$h][$n]))
				{
					$str_graph = $graph[$h][$n];
					if( substr($str_graph, (strlen($str_graph)-1), strlen($str_graph)) == "y" ){
						$explode4 = explode('->', $graph[$h][$n]);
						$simpulGabung = $h . "-" . $explode4[0];

						array_push($gabungSimpulPilihan, $simpulGabung);
					}
				}
			}
		}

		// UNTUK MEMASUKKAN SIMPUL YG SUDAH DIURUTKAN (DARI SIMPUL TUJUAN KE SIMPUL AWAL). (NANTI DIREVERSE ARRAYNYA)
		$simpulFix_finish = array();

		// MASUKKAN PERTAMA KALI SIMPUL TUJUAN (SIMPUL AKHIR) KE ARRAY DGN INDEX 0. (NANTI DIBALIK(REVERSE) ARRAYNYA)
		array_push($simpulFix_finish, $simpul_tujuan);

		$simpul_explode = $simpul_tujuan;
		for($v = 0; $v < 1; $v++)
		{
			for($w = 0; $w < count($gabungSimpulPilihan); $w++)
			{
				$explode_simpul = $gabungSimpulPilihan[$w];
				$explode5 = explode('-', $explode_simpul);
				if($simpul_explode == $explode5[1])
				{
					array_push($simpulFix_finish, $explode5[0]);
					$simpul_explode = $explode5[0];
				}
				if($simpul_explode == $simpul_awal){
					break;
				}
			}

			if($simpul_awal != $simpul_explode){
				--$v;
			}else{
				break;
			}
		}// end for cari simpul yang dibuletin lalu dibandingkan dgn simpul_tujuan


		// ARRAY DI BALIK INDEXNYA; JADI SIMPUL TUJUAN DI PINDAH POSISI KE AKHIR INDEX ARRAY
		$simpulFix_finish_reverse = array_reverse($simpulFix_finish);

		$jalur_terpendek = "";
		for($x = 0; $x < count($simpulFix_finish_reverse); $x++)
		{
			if($x == (count($simpulFix_finish_reverse)-1))
			{
				$jalur_terpendek .= $simpulFix_finish_reverse[$x];
			}else{
				$jalur_terpendek .= $simpulFix_finish_reverse[$x] . "->";
			}
		}

		$json['status'] 	= 'success';
		$json['success'] 	= 'generate_jalur_terpendek';
		$json['teks'] 		= 'Jalur berhasil dibuat';
		$json['content']	= $jalur_terpendek;

		return json_encode($json);

	}// end function jalurTerpendek
}
?>
