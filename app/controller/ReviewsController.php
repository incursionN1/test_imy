<?php
use Imy\Core\Controller;
use Imy\Core\Tools;

class ReviewsController extends Controller
{
    function init()
    {
        $reviwsTable = new DataTable('review');
        $this->v['reviews'] = $reviwsTable->get();
    }

    function ajax_addReviews() {
        if ($this->request->isPost() && !empty($this->request->all()['params']))
        {
            $reviwsTable = new DataTable('review');
            try {
                $reviwsTable->create($this->request->all()['params']);
                return $this->success( 'Отзыв успешно добавлен');
            }
            catch (\Exception $e) {
                return $this->error( $e->getMessage());
            }
        }
        return $this->error('Неверный запрос');
    }

}
