<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d98ed2ad4e9c725971133a6ea85dc83
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SearchWP\\Dependencies\\' => 22,
            'SearchWP\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SearchWP\\Dependencies\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'SearchWP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../includes',
        ),
    );

    public static $classMap = array (
        'SearchWP\\Admin\\AdminBar' => __DIR__ . '/../..' . '/../includes/Admin/AdminBar.php',
        'SearchWP\\Admin\\AdminNotice' => __DIR__ . '/../..' . '/../includes/Admin/AdminNotice.php',
        'SearchWP\\Admin\\AdminNotices\\DirtyInstallAdminNotice' => __DIR__ . '/../..' . '/../includes/Admin/AdminNotices/DirtyInstallAdminNotice.php',
        'SearchWP\\Admin\\AdminNotices\\MissingEngineSourceAdminNotice' => __DIR__ . '/../..' . '/../includes/Admin/AdminNotices/MissingEngineSourceAdminNotice.php',
        'SearchWP\\Admin\\AdminNotices\\MissingIntegrationAdminNotice' => __DIR__ . '/../..' . '/../includes/Admin/AdminNotices/MissingIntegrationAdminNotice.php',
        'SearchWP\\Admin\\DashboardWidgets\\StatisticsDashboardWidget' => __DIR__ . '/../..' . '/../includes/Admin/DashboardWidgets/StatisticsDashboardWidget.php',
        'SearchWP\\Admin\\NavTab' => __DIR__ . '/../..' . '/../includes/Admin/NavTab.php',
        'SearchWP\\Admin\\OptionsView' => __DIR__ . '/../..' . '/../includes/Admin/OptionsView.php',
        'SearchWP\\Admin\\Views\\AdvancedView' => __DIR__ . '/../..' . '/../includes/Admin/Views/AdvancedView.php',
        'SearchWP\\Admin\\Views\\EnginesView' => __DIR__ . '/../..' . '/../includes/Admin/Views/EnginesView.php',
        'SearchWP\\Admin\\Views\\SettingsView' => __DIR__ . '/../..' . '/../includes/Admin/Views/SettingsView.php',
        'SearchWP\\Admin\\Views\\StatisticsView' => __DIR__ . '/../..' . '/../includes/Admin/Views/StatisticsView.php',
        'SearchWP\\Admin\\Views\\SupportView' => __DIR__ . '/../..' . '/../includes/Admin/Views/SupportView.php',
        'SearchWP\\Admin\\i18n' => __DIR__ . '/../..' . '/../includes/Admin/i18n.php',
        'SearchWP\\Attribute' => __DIR__ . '/../..' . '/../includes/Attribute.php',
        'SearchWP\\BackgroundProcess' => __DIR__ . '/../..' . '/../includes/BackgroundProcess.php',
        'SearchWP\\CLI' => __DIR__ . '/../..' . '/../includes/CLI.php',
        'SearchWP\\Debug' => __DIR__ . '/../..' . '/../includes/Debug.php',
        'SearchWP\\Dependencies\\Monolog\\DateTimeImmutable' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/DateTimeImmutable.php',
        'SearchWP\\Dependencies\\Monolog\\ErrorHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/ErrorHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\ChromePHPFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/ChromePHPFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\ElasticaFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/ElasticaFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\ElasticsearchFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/ElasticsearchFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\FlowdockFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/FlowdockFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\FluentdFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/FluentdFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\FormatterInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/FormatterInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\GelfMessageFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/GelfMessageFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\HtmlFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/HtmlFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\JsonFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/JsonFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\LineFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/LineFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\LogglyFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/LogglyFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\LogmaticFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/LogmaticFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\LogstashFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/LogstashFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\MongoDBFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/MongoDBFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\NormalizerFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/NormalizerFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\ScalarFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/ScalarFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Formatter\\WildfireFormatter' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Formatter/WildfireFormatter.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\AbstractHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/AbstractHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\AbstractProcessingHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\AbstractSyslogHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/AbstractSyslogHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\AmqpHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/AmqpHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\BrowserConsoleHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/BrowserConsoleHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\BufferHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/BufferHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ChromePHPHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ChromePHPHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\CouchDBHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/CouchDBHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\CubeHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/CubeHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\Curl\\Util' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/Curl/Util.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\DeduplicationHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/DeduplicationHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\DoctrineCouchDBHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/DoctrineCouchDBHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\DynamoDbHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/DynamoDbHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ElasticaHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ElasticaHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ElasticsearchHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ElasticsearchHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ErrorLogHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ErrorLogHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FallbackGroupHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FallbackGroupHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FilterHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FilterHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FingersCrossedHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FingersCrossedHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FingersCrossed\\ActivationStrategyInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ActivationStrategyInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FingersCrossed\\ChannelLevelActivationStrategy' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ChannelLevelActivationStrategy.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FingersCrossed/ErrorLevelActivationStrategy.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FirePHPHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FirePHPHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FleepHookHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FleepHookHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FlowdockHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FlowdockHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FormattableHandlerInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FormattableHandlerInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\FormattableHandlerTrait' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/FormattableHandlerTrait.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\GelfHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/GelfHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\GroupHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/GroupHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\Handler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/Handler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\HandlerInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/HandlerInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\HandlerWrapper' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/HandlerWrapper.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\IFTTTHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/IFTTTHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\InsightOpsHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/InsightOpsHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\LogEntriesHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/LogEntriesHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\LogglyHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/LogglyHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\LogmaticHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/LogmaticHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\MailHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/MailHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\MandrillHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/MandrillHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\MissingExtensionException' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/MissingExtensionException.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\MongoDBHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/MongoDBHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\NativeMailerHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/NativeMailerHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\NewRelicHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/NewRelicHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\NoopHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/NoopHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\NullHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/NullHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\OverflowHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/OverflowHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\PHPConsoleHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/PHPConsoleHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ProcessHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ProcessHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ProcessableHandlerInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ProcessableHandlerInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ProcessableHandlerTrait' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ProcessableHandlerTrait.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\PsrHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/PsrHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\PushoverHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/PushoverHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\RedisHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/RedisHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\RollbarHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/RollbarHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\RotatingFileHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/RotatingFileHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SamplingHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SamplingHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SendGridHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SendGridHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SlackHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SlackHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SlackWebhookHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SlackWebhookHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\Slack\\SlackRecord' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/Slack/SlackRecord.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SocketHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SocketHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SqsHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SqsHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\StreamHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/StreamHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SwiftMailerHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SwiftMailerHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SyslogHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SyslogHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SyslogUdpHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SyslogUdpHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\SyslogUdp\\UdpSocket' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/SyslogUdp/UdpSocket.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\TelegramBotHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/TelegramBotHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\TestHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/TestHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\WebRequestRecognizerTrait' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/WebRequestRecognizerTrait.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\WhatFailureGroupHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/WhatFailureGroupHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Handler\\ZendMonitorHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Handler/ZendMonitorHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Logger' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Logger.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\GitProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/GitProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\HostnameProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/HostnameProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\IntrospectionProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/IntrospectionProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\MemoryPeakUsageProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/MemoryPeakUsageProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\MemoryProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/MemoryProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\MemoryUsageProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/MemoryUsageProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\MercurialProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/MercurialProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\ProcessIdProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/ProcessIdProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\ProcessorInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/ProcessorInterface.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\PsrLogMessageProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/PsrLogMessageProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\TagProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/TagProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\UidProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/UidProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Processor\\WebProcessor' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Processor/WebProcessor.php',
        'SearchWP\\Dependencies\\Monolog\\Registry' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Registry.php',
        'SearchWP\\Dependencies\\Monolog\\ResettableInterface' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/ResettableInterface.php',
        'SearchWP\\Dependencies\\Monolog\\SignalHandler' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/SignalHandler.php',
        'SearchWP\\Dependencies\\Monolog\\Utils' => __DIR__ . '/..' . '/monolog/monolog/src/Monolog/Utils.php',
        'SearchWP\\Dependencies\\Psr\\Container\\ContainerExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerExceptionInterface.php',
        'SearchWP\\Dependencies\\Psr\\Container\\ContainerInterface' => __DIR__ . '/..' . '/psr/container/src/ContainerInterface.php',
        'SearchWP\\Dependencies\\Psr\\Container\\NotFoundExceptionInterface' => __DIR__ . '/..' . '/psr/container/src/NotFoundExceptionInterface.php',
        'SearchWP\\Dependencies\\Psr\\EventDispatcher\\EventDispatcherInterface' => __DIR__ . '/..' . '/psr/event-dispatcher/src/EventDispatcherInterface.php',
        'SearchWP\\Dependencies\\Psr\\EventDispatcher\\ListenerProviderInterface' => __DIR__ . '/..' . '/psr/event-dispatcher/src/ListenerProviderInterface.php',
        'SearchWP\\Dependencies\\Psr\\EventDispatcher\\StoppableEventInterface' => __DIR__ . '/..' . '/psr/event-dispatcher/src/StoppableEventInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Client\\ClientExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/ClientExceptionInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Client\\ClientInterface' => __DIR__ . '/..' . '/psr/http-client/src/ClientInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Client\\NetworkExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/NetworkExceptionInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Client\\RequestExceptionInterface' => __DIR__ . '/..' . '/psr/http-client/src/RequestExceptionInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\MessageInterface' => __DIR__ . '/..' . '/psr/http-message/src/MessageInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\RequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/RequestInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\ResponseInterface' => __DIR__ . '/..' . '/psr/http-message/src/ResponseInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\ServerRequestInterface' => __DIR__ . '/..' . '/psr/http-message/src/ServerRequestInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\StreamInterface' => __DIR__ . '/..' . '/psr/http-message/src/StreamInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\UploadedFileInterface' => __DIR__ . '/..' . '/psr/http-message/src/UploadedFileInterface.php',
        'SearchWP\\Dependencies\\Psr\\Http\\Message\\UriInterface' => __DIR__ . '/..' . '/psr/http-message/src/UriInterface.php',
        'SearchWP\\Dependencies\\Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'SearchWP\\Dependencies\\Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'SearchWP\\Dependencies\\Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'SearchWP\\Dependencies\\Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'SearchWP\\Dependencies\\Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'SearchWP\\Dependencies\\Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'SearchWP\\Dependencies\\Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'SearchWP\\Dependencies\\Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'SearchWP\\Dependencies\\Psr\\SimpleCache\\CacheException' => __DIR__ . '/..' . '/psr/simple-cache/src/CacheException.php',
        'SearchWP\\Dependencies\\Psr\\SimpleCache\\CacheInterface' => __DIR__ . '/..' . '/psr/simple-cache/src/CacheInterface.php',
        'SearchWP\\Dependencies\\Psr\\SimpleCache\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/simple-cache/src/InvalidArgumentException.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\ControlSymbol' => __DIR__ . '/..' . '/henck/rtf-to-html/src/ControlSymbol.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\ControlWord' => __DIR__ . '/..' . '/henck/rtf-to-html/src/ControlWord.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Document' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Document.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Element' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Element.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Group' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Group.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Html\\Font' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Html/Font.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Html\\HtmlFormatter' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Html/HtmlFormatter.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Html\\Image' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Html/Image.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Html\\State' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Html/State.php',
        'SearchWP\\Dependencies\\RtfHtmlPhp\\Text' => __DIR__ . '/..' . '/henck/rtf-to-html/src/Text.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Config' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Config.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Document' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Document.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementArray' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementArray.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementBoolean' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementBoolean.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementDate' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementDate.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementHexa' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementHexa.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementMissing' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementMissing.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementName' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementName.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementNull' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementNull.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementNumeric' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementNumeric.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementString' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementString.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementStruct' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementStruct.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Element\\ElementXRef' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Element/ElementXRef.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\ISOLatin1Encoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/ISOLatin1Encoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\ISOLatin9Encoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/ISOLatin9Encoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\MacRomanEncoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/MacRomanEncoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\PostScriptGlyphs' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/PostScriptGlyphs.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\StandardEncoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/StandardEncoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Encoding\\WinAnsiEncoding' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Encoding/WinAnsiEncoding.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontCIDFontType0' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontCIDFontType0.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontCIDFontType2' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontCIDFontType2.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontTrueType' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontTrueType.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontType0' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontType0.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontType1' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontType1.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Font\\FontType3' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Font/FontType3.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Header' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Header.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\PDFObject' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/PDFObject.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Page' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Page.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Pages' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Pages.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\Parser' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/Parser.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\RawData\\FilterHelper' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/RawData/FilterHelper.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\RawData\\RawDataParser' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/RawData/RawDataParser.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\XObject\\Form' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/XObject/Form.php',
        'SearchWP\\Dependencies\\Smalot\\PdfParser\\XObject\\Image' => __DIR__ . '/..' . '/smalot/pdfparser/src/Smalot/PdfParser/XObject/Image.php',
        'SearchWP\\Dependencies\\Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Danish' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Danish.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Dutch' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Dutch.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\English' => __DIR__ . '/..' . '/wamania/php-stemmer/src/English.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\French' => __DIR__ . '/..' . '/wamania/php-stemmer/src/French.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\German' => __DIR__ . '/..' . '/wamania/php-stemmer/src/German.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Italian' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Italian.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Norwegian' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Norwegian.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Portuguese' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Portuguese.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Romanian' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Romanian.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Russian' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Russian.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Spanish' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Spanish.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Stem' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Stem.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Stemmer' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Stemmer.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Swedish' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Swedish.php',
        'SearchWP\\Dependencies\\Wamania\\Snowball\\Utf8' => __DIR__ . '/..' . '/wamania/php-stemmer/src/Utf8.php',
        'SearchWP\\Dependencies\\dekor\\ArrayToTextTable' => __DIR__ . '/..' . '/dekor/php-array-table/src/ArrayToTextTable.php',
        'SearchWP\\Document' => __DIR__ . '/../..' . '/../includes/Document.php',
        'SearchWP\\Engine' => __DIR__ . '/../..' . '/../includes/Engine.php',
        'SearchWP\\Entries' => __DIR__ . '/../..' . '/../includes/Entries.php',
        'SearchWP\\Entry' => __DIR__ . '/../..' . '/../includes/Entry.php',
        'SearchWP\\Highlighter' => __DIR__ . '/../..' . '/../includes/Highlighter.php',
        'SearchWP\\Index\\Controller' => __DIR__ . '/../..' . '/../includes/Index/Controller.php',
        'SearchWP\\Index\\Engine\\Base' => __DIR__ . '/../..' . '/../includes/Index/Engine/Base.php',
        'SearchWP\\Index\\Engine\\Table' => __DIR__ . '/../..' . '/../includes/Index/Engine/Table.php',
        'SearchWP\\Index\\Tables\\IndexTable' => __DIR__ . '/../..' . '/../includes/Index/Tables/IndexTable.php',
        'SearchWP\\Index\\Tables\\LogTable' => __DIR__ . '/../..' . '/../includes/Index/Tables/LogTable.php',
        'SearchWP\\Index\\Tables\\StatusTable' => __DIR__ . '/../..' . '/../includes/Index/Tables/StatusTable.php',
        'SearchWP\\Index\\Tables\\TokensTable' => __DIR__ . '/../..' . '/../includes/Index/Tables/TokensTable.php',
        'SearchWP\\Indexer' => __DIR__ . '/../..' . '/../includes/Indexer.php',
        'SearchWP\\Integrations\\AdvancedCustomFields' => __DIR__ . '/../..' . '/../includes/Integrations/AdvancedCustomFields.php',
        'SearchWP\\Integrations\\BeaverBuilder' => __DIR__ . '/../..' . '/../includes/Integrations/BeaverBuilder.php',
        'SearchWP\\Integrations\\Divi' => __DIR__ . '/../..' . '/../includes/Integrations/Divi.php',
        'SearchWP\\Integrations\\PageBuilder' => __DIR__ . '/../..' . '/../includes/Integrations/PageBuilder.php',
        'SearchWP\\Integrations\\WooCommerceAdminSearch' => __DIR__ . '/../..' . '/../includes/Integrations/WooCommerceAdminSearch.php',
        'SearchWP\\Integrations\\WpAllImport' => __DIR__ . '/../..' . '/../includes/Integrations/WpAllImport.php',
        'SearchWP\\License' => __DIR__ . '/../..' . '/../includes/License.php',
        'SearchWP\\Logic\\AndLimiter' => __DIR__ . '/../..' . '/../includes/Logic/AndLimiter.php',
        'SearchWP\\Logic\\FuzzyMatches' => __DIR__ . '/../..' . '/../includes/Logic/FuzzyMatches.php',
        'SearchWP\\Logic\\PartialMatches' => __DIR__ . '/../..' . '/../includes/Logic/PartialMatches.php',
        'SearchWP\\Logic\\PhraseLimiter' => __DIR__ . '/../..' . '/../includes/Logic/PhraseLimiter.php',
        'SearchWP\\Logic\\Stopwords' => __DIR__ . '/../..' . '/../includes/Logic/Stopwords.php',
        'SearchWP\\Logic\\Synonyms' => __DIR__ . '/../..' . '/../includes/Logic/Synonyms.php',
        'SearchWP\\Mod' => __DIR__ . '/../..' . '/../includes/Mod.php',
        'SearchWP\\Native' => __DIR__ . '/../..' . '/../includes/Native.php',
        'SearchWP\\Notice' => __DIR__ . '/../..' . '/../includes/Notice.php',
        'SearchWP\\Option' => __DIR__ . '/../..' . '/../includes/Option.php',
        'SearchWP\\Parser' => __DIR__ . '/../..' . '/../includes/Parser.php',
        'SearchWP\\Query' => __DIR__ . '/../..' . '/../includes/Query.php',
        'SearchWP\\Rest' => __DIR__ . '/../..' . '/../includes/Rest.php',
        'SearchWP\\Rule' => __DIR__ . '/../..' . '/../includes/Rule.php',
        'SearchWP\\Settings' => __DIR__ . '/../..' . '/../includes/Settings.php',
        'SearchWP\\Source' => __DIR__ . '/../..' . '/../includes/Source.php',
        'SearchWP\\Sources\\Attachment' => __DIR__ . '/../..' . '/../includes/Sources/Attachment.php',
        'SearchWP\\Sources\\Comment' => __DIR__ . '/../..' . '/../includes/Sources/Comment.php',
        'SearchWP\\Sources\\Post' => __DIR__ . '/../..' . '/../includes/Sources/Post.php',
        'SearchWP\\Sources\\User' => __DIR__ . '/../..' . '/../includes/Sources/User.php',
        'SearchWP\\Statistics' => __DIR__ . '/../..' . '/../includes/Statistics.php',
        'SearchWP\\Stemmer' => __DIR__ . '/../..' . '/../includes/Stemmer.php',
        'SearchWP\\Tokens' => __DIR__ . '/../..' . '/../includes/Tokens.php',
        'SearchWP\\Updater' => __DIR__ . '/../..' . '/../includes/Updater.php',
        'SearchWP\\Upgrader' => __DIR__ . '/../..' . '/../includes/Upgrader.php',
        'SearchWP\\Utils' => __DIR__ . '/../..' . '/../includes/Utils.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d98ed2ad4e9c725971133a6ea85dc83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d98ed2ad4e9c725971133a6ea85dc83::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d98ed2ad4e9c725971133a6ea85dc83::$classMap;

        }, null, ClassLoader::class);
    }
}
