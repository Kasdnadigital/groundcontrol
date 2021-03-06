<?php

namespace Yoast\WP\SEO\Premium\Integrations;

use Yoast\WP\Lib\Model;
use Yoast\WP\SEO\Integrations\Integration_Interface;
/**
 * Adds cleanup hooks.
 */
class Cleanup_Integration implements Integration_Interface {

	/**
	 * Returns the conditionals based in which this loadable should be active.
	 *
	 * @return array The array of conditionals.
	 */
	public static function get_conditionals() {
		return [];
	}

	/**
	 * Initializes the integration.
	 *
	 * This is the place to register hooks and filters.
	 *
	 * @return void
	 */
	public function register_hooks() {
		\add_filter( 'wpseo_cleanup_tasks', [ $this, 'add_cleanup_tasks' ] );
	}

	/**
	 * Adds cleanup tasks for the cleanup integration.
	 *
	 * @param array $tasks Array of tasks to be added.
	 *
	 * @return array An associative array of tasks to be added to the cleanup integration.
	 */
	public function add_cleanup_tasks( $tasks ) {
		return array_merge(
			$tasks,
			[
				'clean_orphaned_indexables_prominent_words' => function( $limit ) {
					return $this->cleanup_orphaned_from_table( 'Prominent_Words', 'indexable_id', $limit );
				},
			]
		);
	}

	/**
	 * Cleans orphaned rows from a yoast table.
	 *
	 * @param string $table  The table to cleanup.
	 * @param string $column The table column the cleanup will rely on.
	 * @param int    $limit  The limit we'll apply to the queries.
	 *
	 * @return int The number of deleted rows.
	 */
	public function cleanup_orphaned_from_table( $table, $column, $limit ) {
		global $wpdb;

		$table           = Model::get_table_name( $table );
		$indexable_table = Model::get_table_name( 'Indexable' );

		// Warning: If this query is changed, make sure to update the query in cleanup_orphaned_from_table in Free as well.
		// phpcs:disable WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: There is no unescaped user input.
		$query = $wpdb->prepare(
			"
			SELECT table_to_clean.{$column}
			FROM {$table} table_to_clean
			LEFT JOIN {$indexable_table} AS indexable_table
			ON table_to_clean.{$column} = indexable_table.id
			WHERE indexable_table.id IS NULL
			AND table_to_clean.{$column} IS NOT NULL
			LIMIT %d",
			$limit
		);
		// phpcs:enable

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Reason: Already prepared.
		$orphans = $wpdb->get_col( $query );

		if ( empty( $orphans ) ) {
			return 0;
		}
		// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQL.NotPrepared, WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching -- Reason: Already prepared.
		return intval( $wpdb->query( "DELETE FROM $table WHERE {$column} IN( " . implode( ',', $orphans ) . ' ) ' ) );
	}
}
