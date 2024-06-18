<?php

class Image {
    protected Database $db;

	public function __construct( Database $db ) {
		$this->db = $db;
	}

    public function save( string $filename, string $alttext ): int {
		$sql = "INSERT INTO images (filename, alttext) VALUES (:filename, :alttext);";
		$this->db->sql_execute( $sql, [ 'filename' => $filename, 'alttext' => $alttext ] );

		return $this->db->lastInsertId();
	}

    public function delete( int $id ):void {
        $sql = "DELETE FROM images WHERE id = :id;";
        $this->db->sql_execute( $sql, ['id' => $id ]);
    }

	public function update( int $id, string $alttext ): void {
		$sql = "UPDATE images SET alttext = :alttext;";
	}
}