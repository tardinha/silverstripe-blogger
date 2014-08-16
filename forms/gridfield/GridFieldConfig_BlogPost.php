<?php

/**
 * GridField config necessary for managing a SiteTree object.
 *
 * @package silverstripe
 * @subpackage blog
 *
 * @author Michael Strong <github@michaelstrong.co.uk>
 **/
class GridFieldConfig_BlogPost extends GridFieldConfig {

  public function __construct($itemsPerPage = null) {
    parent::__construct($itemsPerPage);
    $this->addComponent(new GridFieldButtonRow('before'));
    $this->addComponent(new GridFieldBlogPostAddNewButton('buttons-before-left'));
    $this->addComponent(new GridFieldToolbarHeader());
    $this->addComponent($sort = new GridFieldSortableHeader());
    $this->addComponent($filter = new GridFieldFilterHeader());
    $this->addComponent(new GridFieldDataColumns());
    $this->addComponent(new GridFieldSiteTreeEditButton());
    $this->addComponent(new GridFieldPageCount('toolbar-header-right'));
    $this->addComponent($pagination = new GridFieldPaginator($itemsPerPage));
    $this->addComponent(new GridFieldBlogPostState());

    if (class_exists('GridFieldBulkManager')) {
      $this->addComponent(new GridFieldBulkManager());
      $this->getComponentByType('GridFieldBulkManager')->removeBulkAction('bulkedit');
      $this->getComponentByType('GridFieldBulkManager')->removeBulkAction('delete');
      $this->getComponentByType('GridFieldBulkManager')->removeBulkAction('unlink');
      $this->getComponentByType('GridFieldBulkManager')->addBulkAction(
        'unpublish', 'Unpublish & Delete', 'BlogPostGridFieldBulkAction_UnpublishDelete',
        array(
          'isAjax' => true,
          'icon' => 'delete',
          'isDestructive' => true
        )
      );
    }

    $pagination->setThrowExceptionOnBadDataType(true);
  }


}
