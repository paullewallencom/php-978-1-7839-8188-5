Vagrant.configure("2") do |config|

  config.vm.box = "hashicorp/precise64"
  #config.vm.box_url = "http://files.vagrantup.com/precise64.box" # Vagrant knows where to get the "precise64" box already

  config.vm.provision :shell, :path => "bootstrap/01-prepare-precise64.sh"
  config.vm.provision :shell, :path => "bootstrap/02-configure-app-for-precise64.sh"
  config.vm.provision :shell, :path => "bootstrap/03-configure-app.sh"

  config.vm.network "forwarded_port", guest: 80, host: 8888

end
