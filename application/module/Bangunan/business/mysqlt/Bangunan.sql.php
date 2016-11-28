<?php
/** 
* @copyright Copyright (c) 2014, PT Gamatechno Indonesia
* @license http://gtfw.gamatechno.com/#license
**/

$sql['get_data'] = "
SELECT DISTINCT
master_aset.kode_aset AS KODE_ASET,
master_aset.nama_aset AS NAMA_ASET,
master_aset.pic AS PIC,
master_aset.deskripsi_aset AS DESKRIPSI_ASET,
kategori_aset.nama_kategori_aset AS NAMA_KATEGORI_ASET,
status_aset.nama_status_aset AS NAMA_STATUS_ASET
FROM master_aset, kategori_aset, status_aset
WHERE
master_aset.kode_status_aset=status_aset.kode_status_aset
AND master_aset.kode_kategori_aset= kategori_aset.kode_kategori_aset
AND kategori_aset.kode_kategori_aset = 4
	--filter--
--limit--
";

$sql['count_data'] = "
SELECT FOUND_ROWS() AS total
";

$sql['get_list_bangunan'] = "
SELECT DISTINCT
	kode_aset AS KODE_ASET,
	nama_aset AS NAMA_ASET,
	pic AS PIC,
	deskripsi_aset AS DESKRIPSI_ASET,
FROM 
	master_aset
ORDER BY NAMA_ASET ASC
";

$sql['do_add_bangunan']="
INSERT INTO master_aset,status_aset,kategori_aset (kode_aset,kode_status_aset,kode_kategori_aset,nama_aset,pic,deskripsi_aset,kode_status_aset,kode_kategori_aset)
VALUES ('%s','%s','%s','%s','%s','%s','%s','%s');
";

$sql['get_bangunan_by_id']= "
SELECT DISTINCT
	kode_aset AS KODE_ASET,
	nama_aset AS NAMA_ASET,
	pic AS PIC,
	deskripsi_aset AS DESKRIPSI_ASET
	
FROM 
	master_aset 
WHERE 
	kode_aset = '%s' AND kode_status_aset = '%s' AND kode_kategori_aset = '%s';

";

$sql['do_update_bangunan']="
UPDATE master_aset,status_aset,kategori_aset
SET
	nama_aset = '%s',
	pic = '%s',
	deskripsi_aset = '%s',
	nama_status_aset = '%s',
	nama_kategori_aset = '%s'
WHERE kode_aset = '%s' AND kode_status_aset = '%s' AND kode_kategori_aset = '%s';
";

$sql['do_delete_bangunan']="
DELETE from master_aset,status_aset,kategori_aset
WHERE kode_aset='%s' AND kode_status_aset = '%s' AND kode_kategori_aset = '%s';
";

$sql['get_status_aset']="
SELECT
	kode_status_aset AS KODE_STATUS_ASET,
	nama_status_aset AS NAMA_STATUS_ASET
FROM
	status_aset
";

$sql['get_kategori_aset']="
SELECT
	kode_kategori_aset AS KODE_KATEGORI_ASET,
	nama_kategori_aset AS NAMA_KATEGORI_ASET

FROM
	kategori_aset
";

?>