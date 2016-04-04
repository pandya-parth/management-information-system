require 'recap/recipes/static'

set :repository, 'git@bitbucket.org:krishaweb/mis.git'
set :user, 'ubuntu'

server '54.200.79.82', :app

task :production do
  set :application, 'mis'
end

# task :sweden do
#   set :application, 'fantasysweden'
# end

# task :finland do
#   set :application, 'fantasyfinland'
# end

# task :england do
#   set :application, 'fantasyengland'
# end

namespace :composer do  
  task :setup do
    as_app 'curl -sS https://getcomposer.org/installer | php'
  end
  task :install do
    as_app 'php composer.phar install'
  end
  task :update do
    as_app 'php composer.phar update'
  end
end
after 'deploy:setup', 'composer:setup'
after 'deploy:setup', 'composer:install'
# after 'deploy:update_code', 'composer:install'

# def remote_file_exists?(path)
#   results = []

#   invoke_command("if [ -e '#{path}' ]; then echo -n 'true'; fi") do |ch, stream, out|
#     results << (out == 'true')
#   end

#   results.all?
# end

# namespace :silverstripe do  
#   task :protect_setup do
#     if remote_file_exists?('assets')
#       raise CommandError.new("Silverstripe already installed, this action will delete existing uploads.")
#     end
#   end
#   task :assets do
#     as_app 'mkdir assets'
#     as_app 'chmod 777 -Rf assets'
#   end
#   task :build do
#     as_app 'php framework/cli-script.php dev/build flush=all'
#   end
# end
# before 'deploy:setup', 'silverstripe:protect_setup'
# after 'deploy:setup', 'silverstripe:assets'
# after 'deploy:update_code', 'silverstripe:build'

