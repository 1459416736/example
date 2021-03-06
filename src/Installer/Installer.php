<?php

namespace Wing\Example\Installer;

use Closure;
use Zhiyi\Component\Installer\PlusInstallPlugin\AbstractInstaller;
use function Wing\Example\{
    route_path,
    resource_path,
    base_path as component_base_path
};
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Installer extends AbstractInstaller
{
    /**
     * Get the component info onject.
     *
     * @return Medz\Component\ZiyiPlus\PlusComponentExample\Installer\Info
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function getComponentInfo()
    {
        return new Info();
    }

    /**
     * Get the component route file.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function router()
    {
        return route_path();
    }

    /**
     * Get the component resource dir.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function resource()
    {
        return resource_path();
    }

    /**
     * Do run the cpmponent install.
     *
     * @param Closure $next
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function install(Closure $next)
    {
        if (!Schema::hasTable('wing_example')) {
            Schema::create('wing_example', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->increments('id')->comment('主键');
            });
        }

        include component_base_path('/src/table_column.php');
        $next();
    }

    /**
     * Do run update the compoent.
     *
     * @param Closure $next
     *
     * @author Seven Du <shiweidu@outlook.com>
     * @homepage http://medz.cn
     */
    public function update(Closure $next)
    {
        include component_base_path('/src/table_column.php');
        $next();
    }

    public function uninstall(Closure $next)
    {
        Schema::dropIfExists('wing_example');
        $next();
    }
}
