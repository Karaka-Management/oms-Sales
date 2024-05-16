<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Accounting
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\Sales\Models\NullSalesRep;
use phpOMS\Uri\UriFactory;

/**
 * @var \phpOMS\Views\View             $this
 * @var \Modules\Sales\Models\SalesRep $rep
 */
$rep   = $this->data['rep'] ?? new NullSalesRep();
$isNew = $rep->id === 0;

echo $this->data['nav']->render(); ?>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <section class="portlet">
            <form id="iSalesRepForm"
                method="<?= $isNew ? 'PUT' : 'POST'; ?>"
                action="<?= UriFactory::build('{/api}sales/rep?csrf={$CSRF}'); ?>"
                <?= $isNew ? 'data-redirect="' . UriFactory::build('{/base}/sales/rep/view') . '?id={/0/response/id}"' : ''; ?>>
            <div class="portlet-head"><?= $this->getHtml('SalesRep'); ?></div>
            <div class="portlet-body">
                <div class="form-group">
                    <label for="iCode"><?= $this->getHtml('Code'); ?></label>
                    <input id="iCode" type="text" name="code" value="<?= $this->printHtml($rep->code); ?>" required>
                </div>

                <div class="form-group">
                    <label for="iMainRep"><?= $this->getHtml('Name'); ?></label>
                    <div id="iMainRepSelector" class="smart-input-wrapper" data-src="<?= UriFactory::build('{/api}admin/account/find?csrf={$CSRF}'); ?>">
                        <div
                            data-value="<?= $rep->main?->id; ?>"
                            data-name="search"
                            data-limit="10"
                            data-container=""
                            class="input-div"
                            contenteditable="true"><?= $this->printHtml($rep->main?->name1); ?> <?= $this->printHtml($rep->main?->name2); ?></div>
                        <template class="input-data-tpl" data-container="child-container">
                            <div tabindex="0" class="child-container">
                                <div data-value="" data-tpl-value="/id">
                                    <span data-tpl-text="/name/0"></span>
                                    <span data-tpl-text="/name/1"></span>
                                </div>
                            </div>
                        </template>
                        <div class="input-datalist input-datalist-body vh" data-active="true"></div>
                    </div>
                </div>
            </div>
            <div class="portlet-foot">
                <?php if ($isNew) : ?>
                    <input id="iCreateSubmit" type="Submit" value="<?= $this->getHtml('Create', '0', '0'); ?>">
                <?php else : ?>
                    <input id="iSaveSubmit" type="Submit" value="<?= $this->getHtml('Save', '0', '0'); ?>">
                <?php endif; ?>
            </div>
            </form>
        </section>
    </div>
</div>
