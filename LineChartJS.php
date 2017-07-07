<?php


class LineChartJS extends ChartJS{

  private $_type;
  private $_labels;
  private $_dataSet;
  private $_options;

  public function __construct($type = 'line', $labels = [], $dataSet = [], $options = ''){
    $this->_type = $type;
    $this->_labels = $labels;
    $this->_dataSet = $dataSet;
    $this->_options = $options;
  }

  public function setLabel($strLabel = null){
    try {
      if(!is_null($strLabel)){
        array_push($this->_labels, $strLabel);
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  private function generateTypeChart() {
    return json_encode($this->_type);
  }

  private function generateLabelChart() {
    return json_encode($this->_labels);
  }

  private function generateDataSetChart() {
    $arrDataSet = [
      'labels' => $this->_labels,
      'datasets' => $this->_dataSet,
    ];
    return json_encode($arrDataSet);
  }

  private function generateOptionsChart() {
    return json_encode($this->_options);
  }

  public function generateChart(){
    return [
      'jsonType' => $this->generateTypeChart(),
      'jsonData' => $this->generateDataSetChart(),
      'jsonOptions' => $this->generateOptionsChart(),
    ];
  }

}