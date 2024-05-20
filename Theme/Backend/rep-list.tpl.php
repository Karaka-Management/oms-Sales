<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Accounting
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use phpOMS\Uri\UriFactory;

/**
 * @var \phpOMS\Views\View               $this
 * @var \Modules\Sales\Models\SalesRep[] $rep
 */
$rep = $this->data['rep'];

$previous = empty($rep) ? '{/base}/sales/rep/list' : '{/base}/sales/rep/list?{?}&offset=' . \reset($rep)->id . '&ptype=p';
$next     = empty($rep) ? '{/base}/sales/rep/list' : '{/base}/sales/rep/list?{?}&offset=' . \end($rep)->id . '&ptype=n';

echo $this->data['nav']->render(); ?>
<div class="row">
    <div class="col-xs-12">
        <section class="portlet">
            <div class="portlet-head"><?= $this->getHtml('SalesReps'); ?><i class="g-icon download btn end-xs">download</i></div>
            <table class="default sticky">
            <thead>
            <tr>
                <td><?= $this->getHtml('Code'); ?>
                <td class="wf-100"><?= $this->getHtml('Name'); ?>
            <tbody>
            <?php $count = 0; foreach ($rep as $key => $value) : ++$count;
            $url         = UriFactory::build('{/base}/sales/rep/view?{?}&id=' . $value->id); ?>
                <tr tabindex="0" data-href="<?= $url; ?>">
                    <td data-label="<?= $this->getHtml('Code'); ?>"><a href="<?= $url; ?>">
                        <?= $this->printHtml($value->code); ?></a>
                    <td data-label="<?= $this->getHtml('Name'); ?>"><a href="<?= $url; ?>">
                    <?= $this->printHtml($value->main->name1); ?> <?= $this->printHtml($value->main->name2); ?></a>
            <?php endforeach; ?>
            <?php if ($count === 0) : ?>
                <tr><td colspan="3" class="empty"><?= $this->getHtml('Empty', '0', '0'); ?>
            <?php endif; ?>
            </table>
        </section>
    </div>
</div>
