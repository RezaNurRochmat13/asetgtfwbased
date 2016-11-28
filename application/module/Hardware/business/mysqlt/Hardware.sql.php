<?php

$sql['get_data'] ="
SELECT
    m.kode_aset AS 'KODE_ASET',
    m.nama_aset AS 'NAMA_ASET',
	m.pic AS PIC,
	m.deskripsi_aset AS DESKRIPSI_ASET,
	k.nama_kategori_aset AS NAMA_KATEGORI_ASET,
	s.nama_status_aset AS NAMA_STATUS_ASET
FROM
    master_aset m, kategori_aset k, status_aset s
WHERE
	m.kode_kategori_aset=k.kode_kategori_aset AND 
	m.kode_status_aset=s.kode_status_aset AND 
	k.kode_kategori_aset = 1
	
	--filter--
--limit--
";

$sql['count_data'] = "
SELECT FOUND_ROWS() AS total
";

$sql['get_list_hardware'] = "
SELECT 
	m.kode_aset AS KODE_ASET,
	m.nama_aset AS NAMA_ASET,
	m.pic AS PIC,
	m.deskripsi_aset AS DESKRIPSI_ASET,
	k.nama_kategori_aset AS NAMA_KATEGORI_ASET,
	s.nama_status_aset AS NAMA_STATUS_ASET
FROM 
	master_aset m, kategori_aset k, status_aset s
WHERE
	m.kode_kategori_aset=k.kode_kategori_aset AND 
	m.kode_status_aset=s.kode_status_aset
";

$sql['do_add_hardware']="
INSERT INTO master_aset(kode_aset,nama_aset,pic,deskripsi_aset)
VALUES ('%s','%s','%s','%s');
";

$sql['get_hardware_by_id']= "
SELECT 
	kode_aset AS KODE_ASET,
	nama_aset AS NAMA_ASET,
	pic AS PIC,
	deskripsi_aset AS DESKRIPSI_ASET
FROM 
	master_aset 
WHERE 
	kode_aset = '%s';

";

$sql['do_update_hardware']="
UPDATE master_aset
SET
	nama_aset = '%s',
	pic = '%s',
	deskripsi_aset = '%s'
WHERE kode_aset = '%s';
";

$sql['do_delete_hardware']="
DELETE from master_aset
WHERE kode_aset='%s';
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