<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CustomHelper extends Helper
{
    public $helpers = ['Html'];

    public function viewLanguage($photo_dir, $photo)
    {
		$thumb = DS . "epergam2" . DS . $photo_dir . DS . "thumbnail-" . $photo;
		return '<img src="' . $thumb . '" alt="" width="32"/>';
    }
    public function viewCover($photo_dir, $photo)
    {
		$thumb = DS . "epergam2" . DS . $photo_dir . DS . "thumbnail-" . $photo;
		$big = DS . "epergam2" . DS . $photo_dir . DS . $photo;
		return '<a href="' . $big . '" target="_blank"><img src="' . $thumb . '" alt="" /></a>';
    }
    public function viewDoc($documents)
    {
		return '<table class="responsive-table">
		  <tr>
			<td rowspan="8" colspan="2" style="vertical-align: middle; text-align:center;"><?php if (!empty('.$documents->photo_dir.')): ?>
			  <img width="80%" src="/epergam2/<?php echo '.$documents->photo_dir.'?>/thumbnail-<?php echo '.$documents->photo.'?>" alt="<?php echo '.$documents->name.' ?> /></a>
			  <?php else: ?>
			  <img width="80%" src="/epergam2/<?php echo '.$documents->format->photo_dir.'?>/<?php echo '.$documents->format->photo.'?>" alt="<?php echo '.$documents->format->name.' ?>" /></a>
			  <?php endif;?>
			  </td></table>';
}
}
?>
