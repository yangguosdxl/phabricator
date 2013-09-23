<?php

/**
 * @group maniphest
 */
final class ConduitAPI_maniphest_gettasktransactions_Method
  extends ConduitAPI_maniphest_Method {

  public function getMethodDescription() {
    return "Retrieve Maniphest Task Transactions.";
  }

  public function defineParamTypes() {
    return array(
      'ids' => 'required list<int>',
    );
  }

  public function defineReturnType() {
    return 'nonempty list<dict<string, wild>>';
  }

  public function defineErrorTypes() {
    return array(
    );
  }

  protected function execute(ConduitAPIRequest $request) {
    $results = array();
    $task_ids = $request->getValue('ids');

    if (!$task_ids) {
      return $results;
    }

    $tasks = id(new ManiphestTaskQuery())
      ->setViewer($request->getUser())
      ->withIDs($task_ids)
      ->execute();
    $tasks = mpull($tasks, null, 'getPHID');

    $transactions = ManiphestLegacyTransactionQuery::loadByTasks(
      $request->getUser(),
      $tasks);

    foreach ($transactions as $transaction) {
      $task_phid = $transaction->getTaskPHID();
      if (empty($tasks[$task_phid])) {
        continue;
      }

      $task_id = $tasks[$task_phid]->getID();

      $results[$task_id][] = array(
        'taskID'  => $task_id,
        'transactionType'  => $transaction->getTransactionType(),
        'oldValue'  => $transaction->getOldValue(),
        'newValue'  => $transaction->getNewValue(),
        'comments'      => $transaction->getComments(),
        'authorPHID'  => $transaction->getAuthorPHID(),
        'dateCreated' => $transaction->getDateCreated(),
      );
    }

    return $results;
  }
}
