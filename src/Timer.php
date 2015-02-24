<?php
    namespace SamBenne\Execute;

    /**
     * Class Timer
     * @package Execute
     */
    class Timer
    {
        /**
         * @var \SamBenne\Execute\Timer|null
         */
        protected static $instance = null;

        /**
         * @var array $timers
         */
        private static $timers = [];

        public static function getInstance()
        {
            if (!isset(static::$instance)) {
                static::$instance = new static();
            }

            return static::$instance;
        }

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
            self::$timers[$id]['stop'] = microtime(TRUE);
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
