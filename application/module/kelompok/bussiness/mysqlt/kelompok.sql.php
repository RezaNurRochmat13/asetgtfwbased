<?php
$sql['count']     = "
SELECT FOUND_ROWS() AS `count`
";

$sql['get_data_kelompok']  = "
SELECT SQL_CALC_FOUND_ROWS
   kelompok.id,
   kelompok.nama,
   IFNULL(peserta.count, 0) AS child
FROM
   kelompok
   LEFT JOIN
      (SELECT
         kelompokId AS parentId,
         COUNT(pesertaId) AS `count`
      FROM
         peserta
      GROUP BY kelompokId) AS peserta
      ON  peserta.parentId = kelompok.id
 WHERE 1 = 1
 AND kelompok.nama LIKE '%s'
 ORDER BY kelompok.nama
 LIMIT %s, %s
";
?>