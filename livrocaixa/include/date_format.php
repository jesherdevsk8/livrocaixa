<?php
  function getMonthInPortuguese($month) {
      $months = [
          'Jan' => 'Janeiro',
          'Feb' => 'Fevereiro',
          'Mar' => 'Março',
          'Apr' => 'Abril',
          'May' => 'Maio',
          'Jun' => 'Junho',
          'Jul' => 'Julho',
          'Aug' => 'Agosto',
          'Sep' => 'Setembro',
          'Oct' => 'Outubro',
          'Nov' => 'Novembro',
          'Dec' => 'Dezembro'
      ];
      
      return $months[$month];
  }

  $currentMonthEnglish = date('M');

  $currentMonthPortuguese = getMonthInPortuguese($currentMonthEnglish);
  $currentYear = date('Y');

  // Gerar opções para os 12 meses do ano corrente
  $options = '';
  for ($i = 0; $i < 12; $i++) {
      $monthDate = strtotime("+$i month", strtotime($currentYear . '-01-01'));
      $month = date('M', $monthDate);
      $monthPortuguese = getMonthInPortuguese($month);
      $options .= "<option value=\"$monthPortuguese\">$monthPortuguese $currentYear</option>";
  }
?>