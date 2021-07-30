<?Php
require "db_connect.php";
$sql = "SELECT a.*,b.item_name FROM orders a,product b WHERE a.cust_item_id=b.item_id ORDER BY a.order_id ASC";
require 'fpdf.php';
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$width_cell = array(7, 30, 50, 20, 95, 20, 20, 35);
$pdf->SetFont('Arial', 'B', 11);

$pdf->SetFillColor(193, 229, 252);
$pdf->Cell($width_cell[1], 7, 'Order Records', 0, 0, 'C', false);
$pdf->Ln();
$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'NAME', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'ADDRESS', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'PHONE', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Item', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Quantity', 1, 0, 'C', true);
$pdf->Cell($width_cell[6], 10, 'Total Rs.', 1, 0, 'C', true);
$pdf->Cell($width_cell[7], 10, 'TIMESTAMP', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 9);

$pdf->SetFillColor(235, 236, 236);

$fill = false;

foreach ($db_conn->query($sql) as $row) {
    $pdf->Cell($width_cell[0], 10, $row['order_id'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['cust_name'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, $row['cust_addr'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['cust_phn'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, $row['item_name'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[5], 10, $row['cust_quant'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[6], 10, $row['order_total'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[7], 10, $row['timestamp'], 1, 1, 'C', $fill);
    $fill = !$fill;
}
$pdf->Output();
