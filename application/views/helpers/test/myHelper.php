<?php

Class Views_Helpers_Test_myHelper extends Zend_View_Helper_Abstract {
    
    
    /**
     *Тестовый помощник вида Zend_View_Helper_Test, выводит данные в таблице
     *@data - массив входных данных, вида "Ключ->Значение"
     *@attribs - атрибуты таблицы
     */
    
    public function testHelper($data, $attribs = array())
    {
        $attribString = '';
        
	foreach ($attribs as $key => $value) {
	    $attribString .= ' ' . $key .'="' . $value . '"';
	}
	 
	$header = array_shift($data);
	$html = "<table $attribString >\n<tr>\n";
	        
        foreach ($header as $cell) {
	    $escapedCell = $this->view->escape($cell);
	    $html .= "<th>$escapedCell</th>\n";
	}
	        
        $html .= "</tr>\n";
	    foreach ($data as $row) {
	        $html .= "<tr>\n";
	        foreach ($row as $cell) {
	            $escapedCell = $this->view->escape($cell);
	            $html .= "<td>$escapedCell</td>\n";
	        }
                
	        $html .= "</tr>\n";
	    }
	 
	$html .= '</table>';
	return $html;
    }
}