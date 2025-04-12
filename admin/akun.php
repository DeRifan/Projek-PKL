<?php
$title = 'Report';
require 'koneksi.php';
require 'header.php';
?>
<div class="panel-header bg-auto-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <?php
                // API Key
                $apiKey = 'AIzaSyB4Na5M0FliTgeziH3FDoqexU_13H-vvho';

                // ID Spreadsheet dan Range data
                $spreadsheetId = '12h-sded6jc96OZ83r6SJzBZcO3zOzffk5L5htQwHtJM'; 
                $range = 'Sheet1!E2:E';  //range

                // URL API Google Sheets
                $url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$range?key=$apiKey";

                // Inisialisasi cURL untuk request ke Google Sheets API
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response
                $data = json_decode($response, true);

                // data tabel
                if (isset($data['values']) && count($data['values']) > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>JUMLAH AKUN</th></tr>";
                    foreach ($data['values'] as $row) {
                        echo "<tr>";
                        echo "<td>{$row[0]}</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Tidak ada data yang tersedia.";
                }
                ?>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
<?php
require "footer.php";
?>