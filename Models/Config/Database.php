<?php
class Database
{
	var $dbConnect;
	
	function connect($hostName, $userName, $passWord, $dataBase) {
		//echo " host: ".$hostName;
		$this->dbConnect = @mysql_connect($hostName, $userName, $passWord);
		@mysql_select_db($dataBase, $this->dbConnect) or $this->fatal_error('Database Connection', mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		return $this->dbConnect;
	}
	
	function delete($query){	
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		return $result;	
	}
		
	/**
     * Returns an data array containing all the result set rows
     *
     * Function: sqlQueryArray <br>
	 * Purpose : Used by function in models to fetch the result set records and store data in a array, calculate query execution time and track error if any
	 *
	 * @param string $query
     * @return mixed Collection of rows on success or display error message on failure.
     */
	function sqlQueryArray($query) {//echo "<br>".$query;
		/**
		* Array to hold all requested query
		*
		*  @global string $GLOBAL_REQUESTS_QUERIES
		*/
		//echo $query;
		global $GLOBAL_REQUESTS_QUERIES;
		$startTime = $this->CalculExecution();
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno(), mysql_error());
		$tab = array();
		$GLOBAL_REQUESTS_QUERIES[] = $query;
		$icnt = 0;
		//echo "<br>==>".count($result);
		while($data = mysql_fetch_object($result))
		{
		  	$tab[$icnt] = $data;
			$icnt++;
		}
		$endTime = $this->CalculExecution();
		//if (count($tab) == 1) return $tab[0];
		//print_r($tab);
   		return $tab;
	}
	
	/**
     * Add new records to a database table.
     *
     * Function: insertInto <br>
	 * Purpose : used by function in models to insert new records to a table, calculate query execution time and track error if any
	 *
	 * @param string $query
     * @return boolean Returns TRUE on success or display error message on failure
     */
	function insertInto($query) {
		//echo "<br> from insert".$query;
		$startTime = $this->CalculExecution();
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		$endTime = $this->CalculExecution();
		return "true";
	}
	
	/**
     * Update existing records in a table
     *
     * Function: updateInto <br>
	 * Purpose : Used by function in models to edit existing records in a table, calculate query execution time and track error if any
	 *
	 * @param string $query
     * @return boolean Returns TRUE on success or display error message on failure
     */
	function updateInto($query) {
	//echo $query;
		$startTime = $this->CalculExecution();
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		$endTime = $this->CalculExecution();
		return true;
	}
	
	/**
     * Frees memory used by a result handle
     *
     * Function: free<br>
	 * Purpose : Used by function in models to free the allocated memory
	 *
	 * @param string $result The result resource that is being evaluated
     * @return boolean Returns TRUE on success or FALSE on failure.
     */
	function free($result) {
		return @mysql_free_result($result);
	}
	
	/**
     * Execute query
     *
     * Function: sqlQuery <br>
	 * Purpose : Used by function in models to execute the framed query
	 * @param string $query
     * @return boolean Return TRUE(DML statement), resultset(DDL statement) on success or FALSE on error. 
     */
	function sqlQuery($query) {
	//echo $query;
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		return $result;
	}
	
	/**
     * Delete records
     *
     * Function: deleteInto <br>
	 * Purpose : Used by function in models to delete records from a database table
	 * @param string $query
     * @return boolean Return TRUE on success or FALSE on error. 
     */
	function deleteInto($query) {
	//echo $query;
		$result = mysql_query($query, $this->dbConnect) or $this->fatal_error("Query - ".$query, mysql_errno($this->dbConnect), mysql_error($this->dbConnect));
		return $result;
	}
	
	/**
     * Fetch result as an associative array
     *
     * Function: sqlFetchArray <br>
	 * Purpose : Used by function in models to fetch a result row as an associative array
	 *
	 * @param string $query
     * @return mixed Returns an array of strings that corresponds to the fetched row, or FALSE  if there are no more rows
     */
	function sqlFetchArray($result) {
		echo "from sqlFetchArray<br>";
		return @mysql_fetch_array($result, MYSQL_ASSOC);
	}
	
	/**
     * Fetch the content of one cell
     *
     * Function: sqlResult <br>
	 * Purpose : used by function in models to retrieves the contents of particular(should be one cell) column from a result set.
	 *
	 * @param string $result The result resource that is being evaluated
	 * @param string $pos The row number from the result that is being retrieved
     * @return mixed The contents of specified cell from a MySQL result set on success, or FALSE on failure
     */
	function sqlResult($result,$pos) {
		return @mysql_result($result,$pos);
	}
	
	/**
     * Fetch a result row as an object
     *
     * Function: sqlFetchObject <br>
	 * Purpose : used by function in models to fetch a result row as an object.
	 *
	 * @param string $result The result resource that is being evaluated
     * @return mixed Returns an object that corresponds to the fetched row, or FALSE  if there are no more rows
     */
	function sqlFetchObject($result) {
		return @mysql_fetch_object($result);
	}

	/**
     * Get the number of rows in the result
     *
     * Function: sqlNumRows <br>
	 * Purpose : Used by function in models to get the count of rows in a result.
	 *
	 * @param string $result The result resource that is being evaluated
     * @return mixed The number of rows in a result set on success, or FALSE on failure.
     */
	function sqlNumRows($result) {
		//return @mysql_num_rows($result);
		//print_r($result);	
		return mysql_num_rows($result);
	}
	
	/**
     * Fetch a result row as an indexed array
     *
     * Function: sqlFetchRow <br>
	 * Purpose : Used by function in models to fetch a result row as an indexed array.
	 *
	 * @param string $result The result resource that is being evaluated
     * @return mixed Returns a numerically indexed array that corresponds to the fetched row, or FALSE  if there are no more rows
     */
	function sqlFetchRow($result) {
    	return @mysql_fetch_row($result);		
  	}
	
	/**
     * Gets the last generated ID
     *
     * Function: sqlInsertId <br>
	 * Purpose : Used by function in models to retrieves the ID generated for an AUTO_INCREMENT column by the previous INSERT query.
	 *
	 * @param string $result The result resource that is being evaluated
     * @return mixed Return ID generated for an AUTO_INCREMENT column by the previous INSERT query on success, 
	 *               0 if the previous query does not generate an AUTO_INCREMENT value,
	 *               or FALSE if no MySQL connection was established.
     */
	function sqlInsertId($link = "")
	{
		if($link == "") $link = $this->dbConnect;
		return mysql_insert_id($link);
	}
	
	/**
     * Calculate query execution time
     *
     * Function: CalculExecution <br>
	 * Purpose : Used by function in models to calculate the query execution time.
	 *
     * @return float execution time.
     */
	function CalculExecution() 
	{
		list($mSec, $sec) = explode(' ', microtime());
		$r= ((float) $sec + (float) $mSec);
		return $r;
	}
	
	/**
     * Throws error if error occurs while executing query
     *
     * Function: fatal_error <br>
	 * Purpose : To keep track of error message.
	 *
	 * @param string $message Error messages
     * @return float execution time.
     */
	function fatal_error($query, $errorNumber, $errormessage)
	{
		echo '<br>ERROR -- '.$errormessage . ' , Error number  = ' . $errorNumber . ' , Error message = ' . $errormessage;
	}
	
	/**
     * Get the number of rows in the table
     *
     * Function: sqlCalcFoundRows <br>
	 * Purpose : Used to get the total number of rows in the table.
	 *
     * @return integer return total row count.
     */
	function sqlCalcFoundRows() {
		$query = 'SELECT FOUND_ROWS() as totalCount';
		$resource = mysql_query($query);
		$result = mysql_fetch_array($resource);
		return $result['totalCount'];
	}
	
}?>