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
require_once('../../config.php');
require_login();

// Initialize $PAGE, compute blocks.
$PAGE->set_url('/blocks/paradiso/information.php');

$PAGE->set_pagelayout('admin');
$PAGE->set_title("$SITE->shortname: ".get_string('paradisotechnicaltest', 'block_paradiso'));
$PAGE->set_heading(get_string('paradisotechnicaltest', 'block_paradiso'));
if ($PAGE->user_allowed_editing()) {
	$url = clone($PAGE->url);
	if ($PAGE->user_is_editing()) {
		$caption = get_string('blockseditoff');
		$url->param('adminedit', 'off');
	} else {
		$caption = get_string('blocksediton');
		$url->param('adminedit', 'on');
	}
	$buttons = $OUTPUT->single_button($url, $caption, 'get');
	$PAGE->set_button($buttons);
}
echo $OUTPUT->header();

$content = '';
$content .= '<div class="wrapper">';
$content .= '<b>'.get_string('moodleversion','block_paradiso').' </b>: '.$CFG->version.'<br/>';
$content .= '<b>'.get_string('phpversion','block_paradiso').' </b>: '.phpversion().'<br/>';
$content .= '<b>'.get_string('loggedusername','block_paradiso').' </b>: '.$USER->username.'<br/>';
$content .= '<b>'.get_string('firstname','block_paradiso').' </b>: '.$USER->firstname.'<br/>';
$content .= '<b>'.get_string('lastname','block_paradiso').' </b>: '.$USER->lastname.'<br/>';
$content .= '<b>'.get_string('city','block_paradiso').' </b>: '.$USER->city.'<br/>';
$content .= '<b>'.get_string('country','block_paradiso').' </b>: '.$USER->country.'<br/>';
$content .= '<b>'.get_string('image','block_paradiso').' </b>: '.$OUTPUT->user_picture($USER, array('size' => 50, 'class' => '')).'<br/>';
$content .= '<b>'.get_string('userautheticationtype','block_paradiso').' </b>: '.$USER->auth.'<br/>';              
$content .= '</div>';

echo $content;
echo $OUTPUT->footer();
