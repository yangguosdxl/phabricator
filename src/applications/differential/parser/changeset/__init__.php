<?php
/**
 * This file is automatically generated. Lint this module to rebuild it.
 * @generated
 */



phutil_require_module('arcanist', 'difference');
phutil_require_module('arcanist', 'parser/diff');

phutil_require_module('phabricator', 'applications/differential/constants/changetype');
phutil_require_module('phabricator', 'applications/differential/storage/changeset');
phutil_require_module('phabricator', 'applications/differential/storage/diff');
phutil_require_module('phabricator', 'applications/differential/view/inlinecomment');
phutil_require_module('phabricator', 'applications/files/uri');
phutil_require_module('phabricator', 'infrastructure/env');
phutil_require_module('phabricator', 'infrastructure/javelin/markup');
phutil_require_module('phabricator', 'storage/queryfx');

phutil_require_module('phutil', 'filesystem');
phutil_require_module('phutil', 'filesystem/tempfile');
phutil_require_module('phutil', 'future/exec');
phutil_require_module('phutil', 'markup');
phutil_require_module('phutil', 'markup/syntax/engine/default');
phutil_require_module('phutil', 'utils');


phutil_require_source('DifferentialChangesetParser.php');
