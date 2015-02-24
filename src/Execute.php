<?php
    namespace Execute;

    /**
     * Class Execute
     * @package Execute
     */
    class Execute
    {
        /**
         * @var array $timers
         */
        private static $timers = [];
        /**
         * Start Timer
         *
         * @param string $id
         */
        public static function start( $id )
        {
            self::$timers[$id] = [ 'start' => microtime(TRUE) ];
        }

        /**
         * Stop Timer
         *
         * @param string $id
         */
        public static function stop( $id )
        {
            self::$timers[$id] = [ 'stop' => microtime(TRUE) ];
        }

        /**
         * Output Time
         *
         * This will call self::stop
         *
         * @param string $id
         *
         * @return string
         */
        public static function output( $id )
        {
            self::stop($id);
            $timer = self::$timers[$id];

            $executionTime = ($timer['stop'] - $timer['start']);

            return '<b>Total Execution Time:</b> '.$executionTime.' Secs';
        }
    }