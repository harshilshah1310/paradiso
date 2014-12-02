<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block "paradiso"
 *
 * @package     block
 * @subpackage  block_paradiso
 */

defined('MOODLE_INTERNAL') || die();

class block_paradiso extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_paradiso');
    }

    function specialization() {        
        $this->title = get_string('paradisotechnicaltest', 'block_paradiso');
    }   

    function applicable_formats() {
        return array('all'=>true);
    }

    function has_config() {
        return true;
    }

    function instance_allow_multiple() {
        return false;
    }

    function instance_can_be_hidden() {
        return false;
    }

    function get_content () {
        global $USER,$OUTPUT,$CFG;
      
        if ($this->content !== null) {
            return $this->content;
        }
      

        $this->content = new stdClass();
        $this->content->footer = '';
        $this->content->text = '';

        if (isloggedin()) {   // Show the block
            $this->content->text .= '<div class="wrapper">';
            $this->content->text .= '<b>'.get_string('moodleversion','block_paradiso').' </b>: '.$CFG->version.'<br/>';
            $this->content->text .= '<b>'.get_string('phpversion','block_paradiso').' </b>: '.phpversion().'<br/>';
            $this->content->text .= '<b>'.get_string('loggedusername','block_paradiso').' </b>: '.$USER->username.'<br/>';
            $this->content->text .= '<b>'.get_string('firstname','block_paradiso').' </b>: '.$USER->firstname.'<br/>';
            $this->content->text .= '<b>'.get_string('lastname','block_paradiso').' </b>: '.$USER->lastname.'<br/>';
            $this->content->text .= '<b>'.get_string('city','block_paradiso').' </b>: '.$USER->city.'<br/>';
            $this->content->text .= '<b>'.get_string('country','block_paradiso').' </b>: '.$USER->country.'<br/>';
            $this->content->text .= '<b>'.get_string('image','block_paradiso').' </b>: '.$OUTPUT->user_picture($USER, array('size' => 50, 'class' => '')).'<br/>';
            $this->content->text .= '<b>'.get_string('userautheticationtype','block_paradiso').' </b>: '.$USER->auth.'<br/>';              
            $this->content->text .= '</div>';
        }
        else {
            $this->content = null; // User is not login
        }

        return $this->content;
    }
}
