# config/deploy.rb file
require 'bundler/capistrano'

set :application, "dosomething-blog"
set :deploy_to, ENV["DEPLOY_PATH"]
server  ENV["HOSTNAME"], :app, :web

set :user, "ubuntu"
set :group, "ubuntu"
set :use_sudo, false

set :repository, "."
set :scm, :none
set :deploy_via, :copy
set :keep_releases, 1

ssh_options[:keys] = [ENV["CAP_PRIVATE_KEY"]]

namespace :deploy do

  task :link_folders do
    run "ln -nfs #{shared_path}/wp-config.php #{release_path}/wp-config.php"
  end

end

after "deploy:update", "deploy:cleanup"
after "deploy:symlink", "deploy:link_folders"