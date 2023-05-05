<?php
  require_once "db.php";

  /**
   * Use this class to manage user session tokens
   */
  class TokenUtility {
      private $db;

      public function __construct() {
          $this->db = new Database();
      }

      /**
       * Create user session token
       */
      public function createToken($token, $userId, $expires) {
        $this->db->insertTokenQuery(array("token" => $token, "user_id" => $userId, "expires" => $expires));
      }

      /**
       * Check whether the token is valid
       */
      public function checkToken($token) {
        $result = $this->db->selectTokenQuery(['token' => $token]);

        if ($result['success']) {
          $token_data = $result['data'];

          if ($token_data) {
            // if (time() > $token_data['expires']) {
            //   return ['success' => false, 'message' => 'Token expired'];
            // }

            return ['success' => true];
          } else {
            return ['success' => false, 'message' => 'Token invalid'];
          }
        } else {
          return $result;
        }
      }
  }
?>