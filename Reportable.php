<?php
class Reportable {
  public $headers, $rows;

  public $tableClass = 'reportable';
  public $tableID;

  public $reportsPath = 'reports';
  public $fileName;

  public $currentRow = 'even';

  function __construct($ID = null) {
    $this->tableID = $ID ? $ID : 'report-' . time();
  }

  public function addHeader($title) {
    $this->headers[] = $title;
  }

  public function addRow($content) {
    $this->rows[] = func_get_args();
  }

  /*
   * HTML Handling
   */

  public function showTable() {
    require_once('Reportable.template.php');
  }

  public function rowClass() {
    $this->currentRow = $this->currentRow == 'even' ? 'odd' : 'even';
    return $this->currentRow;
  }

  /*
   * CSV Handling
   */

  public function setFileName() {
    $this->fileName = $this->fileName ? $this->fileName : $this->tableID . '.csv';
  }

  public function filePath() {
    return $this->reportsPath . '/' . $this->fileName;
  }

  public function generateCSV() {
    $this->setFileName();

    $report = fopen($this->filePath(), 'w+');

    fputcsv($report, array_map('strip_tags', $this->headers));

    foreach($this->rows as $row) {
      fputcsv($report, array_map('strip_tags', $row));
    }

    fclose($report);
  }

  public function getCSV() {
    return file_get_contents($this->filePath());
  }

  public function linkToCSV() {
    return $this->filePath();
  }
}
?>