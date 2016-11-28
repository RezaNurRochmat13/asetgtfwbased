$sql['GetListAgama']="
SELECT 
agmId AS ID_AGAMA,
agmNama AS NAMA_AGAMA
FROM pub_ref_agama
ORDER BY NAMA_AGAMA DESC";