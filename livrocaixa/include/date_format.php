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
?>