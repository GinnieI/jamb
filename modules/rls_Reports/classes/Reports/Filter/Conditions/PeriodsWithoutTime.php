<?php
namespace Reports\Filter\Conditions;

use Reports\Data\Criterion;
/**
 *  Base class for PeriodsWithoutTime condition.
 *
 * */
class PeriodsWithoutTime extends Condition
{
    /**
     * The list of options
     * 
     * @var array
     * */
    protected $optionsList = array(
        'tp_yesterday' => 'Yesterday',
        'tp_today' => 'Today',
        'tp_tomorrow' => 'Tomorrow',
        'last_7_days' => 'Last 7 Days',
        'next_7_days' => 'Next 7 Days',
        'last_month' => 'Last Month',
        'this_month' => 'This Month',
        'next_month' => 'Next Month',
        'last_30_days' => 'Last 30 Days',
        'next_30_days' => 'Next 30 Days',
        'last_year' => 'Last Year',
        'this_year' => 'This Year',
        'next_year' => 'Next Year',
        
        // dinamic conditions
        '=' => 'Equals',
        'not_equal' => 'Does Not Equal',
        'greater_than' => 'After',
        'less_than' => 'Before',
        'between' => 'Is Between',
    );

    /**
     * The list of criterias for options
     * 
     * */
    protected $criteriaList = array(
        // Yesterday
        'tp_yesterday' => 'FIELD_NAME =  UTC_DATE() - INTERVAL 1 DAY',
            
        //Today
        'tp_today'     => 'FIELD_NAME = UTC_DATE()',
        
        // Tomorrow
        'tp_tomorrow'  => 'FIELD_NAME = UTC_DATE() + INTERVAL 1 DAY',

        // Last 7 days
        'last_7_days' => 'FIELD_NAME >= UTC_DATE() - INTERVAL 6 DAY
                AND              
                FIELD_NAME <= UTC_DATE()
        ',

        // Next 7 days
        'next_7_days' => 'FIELD_NAME >= UTC_DATE()
            AND
            FIELD_NAME <= UTC_DATE() + INTERVAL 6 DAY
        ',
        
        // Last Month
        'last_month' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE() - INTERVAL 1 MONTH, "%Y-%m-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE(), "%Y-%m-01") - INTERVAL 1 DAY
        ',
        
        // This Month
        'this_month' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE(), "%Y-%m-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE() + INTERVAL 1 MONTH, "%Y-%m-01") - INTERVAL 1 DAY
        ',
        
        // Next Month
        'next_month' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE() + INTERVAL 1 MONTH, "%Y-%m-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE() + INTERVAL 2 MONTH, "%Y-%m-01") - INTERVAL 1 DAY
        ',
        
        // Last 30 days
        'last_30_days' => 'FIELD_NAME >= UTC_DATE() - INTERVAL 29 DAY
            AND
            FIELD_NAME <= UTC_DATE()
        ',
    
        // Next 30 days
        'next_30_days' => 'FIELD_NAME >= UTC_DATE()
            AND
            FIELD_NAME <= UTC_DATE() + INTERVAL 29 DAY
        ',
        
        // Last Year
        'last_year' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE() - INTERVAL 1 YEAR, "%Y-01-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE() - INTERVAL 1 YEAR, "%Y-12-31")
        ',
        
        // This Year
        'this_year' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE(), "%Y-01-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE(), "%Y-12-31")
        ',
        
        // Next Year
        'next_year' => 'FIELD_NAME >= DATE_FORMAT(UTC_DATE() + INTERVAL 1 YEAR, "%Y-01-01")
            AND
            FIELD_NAME <= DATE_FORMAT(UTC_DATE() + INTERVAL 1 YEAR, "%Y-12-31")
        ',
        
        // dinamic conditions
        // Equals
        '=' => 'FIELD_NAME = "RANGE_DATE_CLOSED"',
        
        // Doesn't equal
        'not_equal' => 'FIELD_NAME IS NULL OR FIELD_NAME != "RANGE_DATE_CLOSED"
        ',
        
        // Greater than
        'greater_than' => 'FIELD_NAME > "RANGE_DATE_CLOSED"
        ',
        
        // Less than
        'less_than' => 'FIELD_NAME < "RANGE_DATE_CLOSED"
        ',
        
        // Custom Between
        'between' => 'FIELD_NAME >= "START_RANGE_DATE_CLOSED" 
            AND
            FIELD_NAME <= "END_RANGE_DATE_CLOSED"
        ',
    );

    /**
     * Returns the criteria for query based on inputed value
     * 
     * @param mixed $saved_value The value which was saved in control
     * @return string criteria
     * */
    public function getCriteria($saved_value)
    {
        $settings = $this->getSettings();
        $criteria_template = $this->criteriaList[$settings['condition']];
        $criteria_string = null;
        
        if (!is_array($saved_value)){
            $saved_value = array($saved_value);
        }
 
        if ($saved_value) {
            $criteria_string = str_replace(
                array(
                    'FIELD_NAME',
                    'START_RANGE_DATE_CLOSED',
                    'END_RANGE_DATE_CLOSED',
                    'RANGE_DATE_CLOSED',
                ),
                array(
                    $settings['field_name'],
                    $saved_value['start_range_date_closed']['to_db'],
                    $saved_value['end_range_date_closed']['to_db'],
                    $saved_value['range_date_closed']['to_db'],                   
                ),
                $criteria_template
            );
        }

        return $criteria_string;
    }

    /**
     * Get condition html.
     *
     * @param array $current_value selected data
     * @return string html for dropdown condition
     * */
    public function getHtml($current_value = null)
    {
        $settings = $this->getSettings();        
        $list     = $this->getOptions();
        
        $html  = '<select name="wizard[DisplayFilters]['.$settings['control_name'] . '_' . $settings['field_guide'].'][condition][]" id="filter_values-'.$settings['control_name'] . '_' . $settings['field_guide'].'">';
        $html .= get_select_options_with_id($list, $current_value);
        $html .= '</select>';
        
        return $html;
    }
}
