USE [DBOrder]
GO
/****** Object:  Table [dbo].[TPL_Region]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Region](
	[Region_id] [int] IDENTITY(1,1) NOT NULL,
	[Region_name] [nvarchar](50) NOT NULL,
	[Region_Active] [bit] NOT NULL,
	[City_id] [int] NOT NULL,
	[user_id] [int] NULL,
	[caret_data] [datetime] NULL,
	[updete_data] [datetime] NULL,
 CONSTRAINT [PK_TPL_Region] PRIMARY KEY CLUSTERED
(
	[Region_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_User_Type]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_User_Type](
	[UType_id] [int] IDENTITY(1,1) NOT NULL,
	[Typr_name] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_TPL_User_Type] PRIMARY KEY CLUSTERED
(
	[UType_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Users](
	[id_user] [int] IDENTITY(1,1) NOT NULL,
	[user_name] [nvarchar](50) NOT NULL,
	[user_pass] [nvarchar](50) NOT NULL,
	[user_Emp_id] [int] NULL,
	[user_Type] [int] NOT NULL,
	[use_note] [nvarchar](max) NULL,
	[user_Active] [bit] NOT NULL,
	[caret_data] [datetime] NULL,
	[updete_data] [datetime] NULL,
 CONSTRAINT [PK_TPL_Users] PRIMARY KEY CLUSTERED
(
	[id_user] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Branch]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Branch](
	[Branch_id] [int] IDENTITY(1,1) NOT NULL,
	[Branch_name] [nvarchar](50) NOT NULL,
	[Branch_nameBus] [nvarchar](50) NULL,
	[Branch_fhone] [nvarchar](50) NULL,
	[Branch_Address] [nvarchar](250) NULL,
	[Branch_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Branch_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Branch] PRIMARY KEY CLUSTERED
(
	[Branch_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Store](
	[Store_id] [int] IDENTITY(1,1) NOT NULL,
	[onlainID] [nvarchar](50) NULL,
	[Store_name] [nvarchar](50) NOT NULL,
	[Store_fhone] [nvarchar](50) NULL,
	[Store_note] [nvarchar](max) NULL,
	[Branch_id] [int] NOT NULL,
	[user_id] [int] NOT NULL,
	[Store_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Store] PRIMARY KEY CLUSTERED
(
	[Store_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Setting]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Setting](
	[Setting_id] [int] IDENTITY(1,1) NOT NULL,
	[Name_Shope] [nvarchar](50) NULL,
	[Shop_Manegaer] [nvarchar](50) NULL,
	[Manegaer_Fhone] [nvarchar](50) NULL,
	[Shope_Fhone] [nvarchar](50) NULL,
	[Shope_Adresse] [nvarchar](250) NULL,
	[Logo_Shope] [image] NULL,
	[Messge_Report] [nvarchar](500) NULL,
	[Delivery_Amount] [decimal](5, 2) NULL,
	[Delivery_Messge] [nvarchar](450) NULL,
	[SalesStatus] [bit] NULL,
	[Store_id] [int] NULL,
	[BackupDB] [nvarchar](250) NULL,
	[PointSystem] [bit] NULL,
	[PointPrice] [decimal](9, 2) NULL,
	[PointPerLE] [decimal](9, 2) NULL,
	[Region] [int] NULL,
	[City] [int] NULL,
	[Country] [int] NULL,
	[SUPCategoryAPPID] [int] NULL,
	[Type_of_goods] [nvarchar](250) NULL,
	[delivery_through] [nvarchar](50) NULL,
	[Minimum_products] [nvarchar](50) NULL,
	[Financial_minimum] [nvarchar](50) NULL,
	[deferred_sale] [bit] NULL,
	[low_profit] [decimal](18, 2) NULL,
 CONSTRAINT [PK_TPL_Setting] PRIMARY KEY CLUSTERED
(
	[Setting_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Category]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Category](
	[Category_id] [int] IDENTITY(1,1) NOT NULL,
	[parntID] [int] NULL,
	[Category_name] [nvarchar](50) NOT NULL,
	[image] [image] NULL,
	[Category_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Category_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Category] PRIMARY KEY CLUSTERED
(
	[Category_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_ProductsHeader]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_ProductsHeader](
	[Products_ID] [int] IDENTITY(1,1) NOT NULL,
	[Products_name] [nvarchar](50) NOT NULL,
	[Products_Sup_id] [int] NOT NULL,
	[Products_Acteve] [bit] NOT NULL,
	[Products_IsScale] [bit] NOT NULL,
	[Products_Onlein] [bit] NOT NULL,
	[Products_Tax] [bit] NOT NULL,
	[Products_Lemt] [smallint] NOT NULL,
	[Products_lemt_day] [smallint] NOT NULL,
	[Products_note] [nvarchar](250) NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updet_data] [datetime] NOT NULL,
	[Hosting_update] [bit] NULL,
 CONSTRAINT [PK_TPL_ProductsHeader] PRIMARY KEY CLUSTERED
(
	[Products_ID] DESC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Stock]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Stock](
	[Stock_ID] [int] IDENTITY(1,1) NOT NULL,
	[onlainID] [nvarchar](50) NULL,
	[Store_id] [int] NOT NULL,
	[Product_Id] [int] NOT NULL,
	[Quantity] [float] NULL,
	[ExpireDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_Stock] PRIMARY KEY CLUSTERED
(
	[Stock_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Unit]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Unit](
	[unit_id] [int] IDENTITY(1,1) NOT NULL,
	[unit_name] [nvarchar](50) NOT NULL,
	[unit_note] [nvarchar](50) NULL,
	[unit_Active] [bit] NOT NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Unit] PRIMARY KEY CLUSTERED
(
	[unit_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_ProductDetails](
	[ProductD_id] [int] IDENTITY(1,1) NOT NULL,
	[Product_id] [int] NOT NULL,
	[ProductsD_unit_id] [int] NOT NULL,
	[ProductsD_Barcode] [nvarchar](20) NOT NULL,
	[ProductsD_Size] [smallint] NOT NULL,
	[ProductsD_Bay] [decimal](18, 2) NOT NULL,
	[ProductsD_Sele1] [decimal](18, 2) NOT NULL,
	[ProductsD_Sele2] [decimal](18, 2) NOT NULL,
	[ProductsD_fast_Sele] [bit] NOT NULL,
	[ProductsD_UnitType] [smallint] NOT NULL,
	[ProductsD_image] [image] NULL,
	[IsOffer] [bit] NULL,
	[Product_Onlein] [bit] NULL,
	[MaxQuntte] [decimal](18, 2) NULL,
	[EndOferDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_ProductDetails] PRIMARY KEY CLUSTERED
(
	[ProductD_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_SecondOffer]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_SecondOffer](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[ProductDetailsId] [int] NOT NULL,
	[PiecesNumber] [smallint] NOT NULL,
	[Discount] [decimal](7, 2) NOT NULL,
	[FromDate] [datetime] NOT NULL,
	[ToDate] [datetime] NOT NULL,
	[PriceBefore] [decimal](10, 2) NOT NULL,
	[PriceAfter] [decimal](10, 2) NOT NULL,
	[user_id] [int] NOT NULL,
 CONSTRAINT [PK_SecondOffer] PRIMARY KEY CLUSTERED
(
	[Id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Comment]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Comment](
	[commentID] [int] IDENTITY(1,1) NOT NULL,
	[Client_ID] [int] NULL,
	[comment] [nvarchar](max) NULL,
	[evaluation] [decimal](1, 1) NULL,
	[carteDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_Comment] PRIMARY KEY CLUSTERED
(
	[commentID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_PrmoCode]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_PrmoCode](
	[PrmoCode_ID] [int] IDENTITY(1,1) NOT NULL,
	[PrmoName] [nvarchar](50) NOT NULL,
	[PrmoCode] [nvarchar](10) NOT NULL,
	[value] [decimal](18, 2) NULL,
	[TypeDec] [bit] NULL,
	[min_invoce] [decimal](18, 2) NULL,
	[used] [int] NULL,
	[stardate] [datetime] NULL,
	[enddate] [datetime] NULL,
	[userID] [int] NOT NULL,
	[CarteDate] [datetime] NULL,
	[updetdate] [datetime] NULL,
 CONSTRAINT [PK_TPL_PrmoCode] PRIMARY KEY CLUSTERED
(
	[PrmoCode_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Client]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Client](
	[Client_id] [int] IDENTITY(1,1) NOT NULL,
	[onlainID] [nvarchar](50) NULL,
	[Client_name] [nvarchar](50) NOT NULL,
	[Client_Balanc] [decimal](18, 3) NULL,
	[Client_points] [decimal](18, 3) NULL,
	[Client_fhoneWhats] [nvarchar](50) NULL,
	[Client_fhoneLeter] [nvarchar](50) NULL,
	[Client_EntiteNumber] [nvarchar](50) NULL,
	[Region_id] [int] NOT NULL,
	[Lat_mab] [nvarchar](50) NULL,
	[Long_mab] [nvarchar](50) NULL,
	[Client_state] [nvarchar](50) NULL,
	[Client_Credit_Limit] [decimal](18, 3) NULL,
	[default_Sael] [nvarchar](50) NULL,
	[Client_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Client_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
	[Client_code] [int] NULL,
	[CategoryAPP] [int] NULL,
	[stor_name] [nvarchar](250) NULL,
 CONSTRAINT [PK_TPL_Client] PRIMARY KEY CLUSTERED
(
	[Client_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Safe](
	[safe_id] [int] IDENTITY(1,1) NOT NULL,
	[safe_name] [nvarchar](50) NOT NULL,
	[bransh_id] [int] NOT NULL,
	[Opening_balance] [decimal](18, 2) NOT NULL,
	[balance_now] [decimal](18, 2) NOT NULL,
	[user_id] [int] NOT NULL,
	[save_acteve] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Safe] PRIMARY KEY CLUSTERED
(
	[safe_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_jobs]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_jobs](
	[jobs_id] [int] IDENTITY(1,1) NOT NULL,
	[jobs_name] [nvarchar](50) NOT NULL,
	[user_id] [int] NOT NULL,
	[jobs_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_jobs] PRIMARY KEY CLUSTERED
(
	[jobs_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_PayType]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_PayType](
	[PayType_id] [int] IDENTITY(1,1) NOT NULL,
	[PayType_name] [nvarchar](50) NOT NULL,
	[user_id] [int] NOT NULL,
	[Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_PayType] PRIMARY KEY CLUSTERED
(
	[PayType_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Employees]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Employees](
	[Employees_id] [int] IDENTITY(1,1) NOT NULL,
	[Employees_name] [nvarchar](50) NOT NULL,
	[Employees_code] [nvarchar](50) NULL,
	[Employees_fhone] [nvarchar](50) NULL,
	[Employees_EntiteNumber] [nvarchar](50) NOT NULL,
	[Region_id] [int] NOT NULL,
	[Employees_state] [nvarchar](250) NULL,
	[PayType_id] [int] NOT NULL,
	[Pay_Sel] [decimal](18, 0) NULL,
	[Total_hour] [decimal](18, 0) NULL,
	[jobs_id] [int] NOT NULL,
	[Branch_id] [int] NOT NULL,
	[data_Active] [datetime] NULL,
	[data_unActive] [datetime] NULL,
	[Employees_note] [nvarchar](max) NULL,
	[Employees_image] [image] NULL,
	[Employees_Active] [bit] NOT NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Employees] PRIMARY KEY CLUSTERED
(
	[Employees_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_SalesHeader]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_SalesHeader](
	[SalesHeader_ID] [int] IDENTITY(1,1) NOT NULL,
	[InvoiceNumber] [int] NOT NULL,
	[coupon_id] [int] NULL,
	[InvoiceType] [bit] NOT NULL,
	[InvoiceDate] [datetime] NOT NULL,
	[Client_ID] [int] NOT NULL,
	[LastBalance] [decimal](18, 2) NULL,
	[finalbalance] [decimal](18, 2) NULL,
	[User_ID] [int] NOT NULL,
	[Store_ID] [int] NOT NULL,
	[Safe_ID] [int] NOT NULL,
	[Status] [nvarchar](10) NOT NULL,
	[Employ_ID] [int] NOT NULL,
	[Dis_Point_Active] [bit] NULL,
	[PayTayp] [nvarchar](10) NULL,
	[SubTotal] [decimal](18, 2) NULL,
	[Total_Discount] [decimal](18, 2) NULL,
	[Discount_G] [decimal](18, 2) NULL,
	[Discount_F] [decimal](18, 2) NULL,
	[Total_Add_Amount] [decimal](18, 2) NULL,
	[Add_Amount_G] [decimal](18, 2) NULL,
	[Add_Amount_F] [decimal](18, 2) NULL,
	[Discount_Prduct] [decimal](18, 2) NULL,
	[Discount_Sales] [decimal](18, 2) NULL,
	[Discount_Point] [decimal](18, 2) NULL,
	[GrandTotal] [decimal](18, 2) NULL,
	[Paid] [decimal](18, 2) NULL,
	[Remaining] [decimal](18, 2) NULL,
	[Total_Profit] [decimal](18, 2) NULL,
	[note] [nvarchar](500) NULL,
	[DelverCost] [decimal](12, 2) NULL,
	[Status_Delvery] [bit] NULL,
	[SalesOnlain] [bit] NULL,
	[comment_ID] [int] NULL,
	[Type_Order] [nvarchar](20) NULL,
 CONSTRAINT [PK_TPL_SalesHeader] PRIMARY KEY CLUSTERED
(
	[SalesHeader_ID] DESC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_SalesDetails]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_SalesDetails](
	[SalesDetails_ID] [int] IDENTITY(1,1) NOT NULL,
	[SalesHeader_ID] [int] NOT NULL,
	[ProductDetails_ID] [int] NOT NULL,
	[BuyPrice] [decimal](18, 2) NOT NULL,
	[SellPrice] [decimal](18, 2) NOT NULL,
	[Quantity] [float] NOT NULL,
	[SubTotalD] [decimal](18, 2) NOT NULL,
	[Discount] [decimal](18, 2) NOT NULL,
	[GrandTotalD] [decimal](18, 2) NOT NULL,
	[Profit] [decimal](18, 2) NOT NULL,
 CONSTRAINT [PK_TPL_SalesDetails] PRIMARY KEY CLUSTERED
(
	[SalesDetails_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Supplier_Grup]    Script Date: 08/10/2023 06:52:31 ******/
    SET ANSI_NULLS ON
    GO
    SET QUOTED_IDENTIFIER ON
    GO
    CREATE TABLE [dbo].[TPL_Supplier_Grup](
        [SupplierGrup_id] [int] IDENTITY(1,1) NOT NULL,
        [SupplierGrup_name] [nvarchar](50) NOT NULL,
        [Grup_note] [nvarchar](max) NULL,
        [user_id] [int] NOT NULL,
        [Grup_Active] [bit] NOT NULL,
        [caret_data] [datetime] NOT NULL,
        [updete_data] [datetime] NOT NULL,
    CONSTRAINT [PK_TPL_Supplier_Grup] PRIMARY KEY CLUSTERED
    (
        [SupplierGrup_id] ASC
    )WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
    ) ON [PRIMARY]
    GO
/****** Object:  Table [dbo].[TPL_Supplier]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Supplier](
	[Supplier_id] [int] IDENTITY(1,1) NOT NULL,
	[Supplier_name] [nvarchar](50) NOT NULL,
	[Supplier_code] [nvarchar](50) NULL,
	[Supplier_Balance] [decimal](18, 0) NULL,
	[Supplier_fhone] [nvarchar](50) NULL,
	[Grup_id] [int] NOT NULL,
	[Region_id] [int] NOT NULL,
	[Supplier_state] [nvarchar](250) NULL,
	[Supervisor_name] [nvarchar](50) NULL,
	[Supervisor_fhone] [nvarchar](50) NULL,
	[agent_name] [nvarchar](50) NULL,
	[agent_fhone] [nvarchar](50) NULL,
	[Supplier_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Supplier_Active] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Supplier] PRIMARY KEY CLUSTERED
(
	[Supplier_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_PurchaseHeader]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_PurchaseHeader](
	[PurchaseH_id] [int] IDENTITY(1,1) NOT NULL,
	[invoice_Number] [int] NOT NULL,
	[InvoiceType] [bit] NOT NULL,
	[Company_invoice_number] [nvarchar](50) NULL,
	[Suppliers_id] [int] NOT NULL,
	[Store_id] [int] NOT NULL,
	[Safe_id] [int] NOT NULL,
	[Name_Emp] [nvarchar](50) NULL,
	[image_invoice] [image] NULL,
	[note] [nvarchar](max) NULL,
	[uoser_id] [int] NOT NULL,
	[Sup_total] [decimal](18, 0) NOT NULL,
	[Total_Discount] [decimal](18, 0) NOT NULL,
	[Suppliers_Last_balance] [decimal](18, 0) NOT NULL,
	[Grand_Total] [decimal](18, 0) NOT NULL,
	[Paid] [decimal](18, 0) NOT NULL,
	[Remaining] [decimal](18, 0) NOT NULL,
	[Suppliers_Final_balance] [decimal](18, 0) NOT NULL,
	[tax] [decimal](18, 0) NULL,
	[caret_data] [datetime] NOT NULL,
	[noCare] [nvarchar](50) NULL,
 CONSTRAINT [PK_TPL_PurchaseHeader] PRIMARY KEY CLUSTERED
(
	[PurchaseH_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_PurchaseDetails]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_PurchaseDetails](
	[PurchaseD_id] [int] IDENTITY(1,1) NOT NULL,
	[Purchase_H_id] [int] NOT NULL,
	[Product_Details_Id] [int] NOT NULL,
	[ExpireDate] [datetime] NULL,
	[BuyPrice] [decimal](18, 0) NOT NULL,
	[SellPrice] [decimal](18, 0) NOT NULL,
	[Quantity] [float] NOT NULL,
	[SubTotal] [decimal](18, 0) NOT NULL,
	[Discount] [decimal](18, 0) NOT NULL,
	[GrandTotal] [decimal](18, 0) NOT NULL,
	[IsReturn] [bit] NOT NULL,
	[caret_data] [datetime] NULL,
 CONSTRAINT [PK_TPL_PurchaseDetails] PRIMARY KEY CLUSTERED
(
	[PurchaseD_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_MovementStock]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_MovementStock](
	[Move_Id] [int] IDENTITY(1,1) NOT NULL,
	[FromStore] [nvarchar](50) NULL,
	[ToStore] [nvarchar](50) NULL,
	[MoveDate] [datetime] NULL,
	[UserId] [int] NULL,
 CONSTRAINT [PK_TPL_MovementStock] PRIMARY KEY CLUSTERED
(
	[Move_Id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_MovementStockDetails]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_MovementStockDetails](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[MovementStockId] [int] NULL,
	[ProductDetailsId] [int] NULL,
	[Quantity] [float] NULL,
 CONSTRAINT [PK_MovementStockDetails] PRIMARY KEY CLUSTERED
(
	[Id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_DeliveryHeader]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_DeliveryHeader](
	[SalesHeader_ID] [int] NOT NULL,
	[onlainID] [int] NULL,
	[InvoiceNumber] [int] NOT NULL,
	[coupon_id] [int] NULL,
	[InvoiceType] [bit] NOT NULL,
	[InvoiceDate] [datetime] NOT NULL,
	[Client_ID] [int] NOT NULL,
	[LastBalance] [decimal](18, 2) NULL,
	[finalbalance] [decimal](18, 2) NULL,
	[User_ID] [int] NOT NULL,
	[Store_ID] [int] NOT NULL,
	[Safe_ID] [int] NOT NULL,
	[Status] [nvarchar](10) NOT NULL,
	[Employ_ID] [int] NOT NULL,
	[Dis_Point_Active] [bit] NULL,
	[PayTayp] [nvarchar](10) NULL,
	[SubTotal] [decimal](18, 2) NULL,
	[Total_Discount] [decimal](18, 2) NULL,
	[Discount_G] [decimal](18, 2) NULL,
	[Discount_F] [decimal](18, 2) NULL,
	[Total_Add_Amount] [decimal](18, 2) NULL,
	[Add_Amount_G] [decimal](18, 2) NULL,
	[Add_Amount_F] [decimal](18, 2) NULL,
	[Discount_Prduct] [decimal](18, 2) NULL,
	[Discount_Sales] [decimal](18, 2) NULL,
	[Discount_Point] [decimal](18, 2) NULL,
	[GrandTotal] [decimal](18, 2) NULL,
	[Paid] [decimal](18, 2) NULL,
	[Remaining] [decimal](18, 2) NULL,
	[Total_Profit] [decimal](18, 2) NULL,
	[note] [nvarchar](500) NULL,
	[DelverCost] [decimal](12, 2) NULL,
	[Status_Delvery] [bit] NULL,
	[SalesOnlain] [bit] NULL,
	[comment_ID] [int] NULL,
	[Type_Order] [nvarchar](20) NULL,
 CONSTRAINT [PK_TPL_DeliveryHeader] PRIMARY KEY CLUSTERED
(
	[SalesHeader_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_DeliveryDetails]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_DeliveryDetails](
	[SalesDetails_ID] [int] NOT NULL,
	[SalesHeader_ID] [int] NOT NULL,
	[ProductDetails_ID] [int] NOT NULL,
	[BuyPrice] [decimal](18, 2) NOT NULL,
	[SellPrice] [decimal](18, 2) NOT NULL,
	[Quantity] [float] NOT NULL,
	[SubTotalD] [decimal](18, 2) NOT NULL,
	[Discount] [decimal](18, 2) NOT NULL,
	[GrandTotalD] [decimal](18, 2) NOT NULL,
	[Profit] [decimal](18, 2) NOT NULL,
 CONSTRAINT [PK_TPL_DeliveryDetails] PRIMARY KEY CLUSTERED
(
	[SalesDetails_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_User_Delivry]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_User_Delivry](
	[DelvryID] [int] IDENTITY(1,1) NOT NULL,
	[EmpID] [int] NOT NULL,
	[userName] [nvarchar](50) NULL,
	[Passwrd] [nvarchar](50) NOT NULL,
	[Lat] [nvarchar](100) NULL,
	[Long] [nvarchar](100) NULL,
	[userID] [int] NOT NULL,
	[Delvry_Active] [bit] NOT NULL,
	[caretdate] [datetime] NOT NULL,
	[updetdate] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_User_Delivry] PRIMARY KEY CLUSTERED
(
	[DelvryID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_SupplierPayments]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_SupplierPayments](
	[PaymentsSup_id] [int] IDENTITY(1,1) NOT NULL,
	[SupplierPay_Id] [int] NOT NULL,
	[FromeAmount] [decimal](18, 0) NOT NULL,
	[PaidAmount] [decimal](18, 0) NOT NULL,
	[NewAmount] [decimal](18, 0) NOT NULL,
	[Pay_note] [nvarchar](max) NULL,
	[Payment_method] [nvarchar](15) NOT NULL,
	[user_id] [int] NOT NULL,
	[safe_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_SupplierPayments] PRIMARY KEY CLUSTERED
(
	[PaymentsSup_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_StockSettlement]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_StockSettlement](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[NoSettlement] [int] NOT NULL,
	[ProductDetailsId] [int] NOT NULL,
	[SettlementDate] [datetime] NOT NULL,
	[StockNow] [float] NOT NULL,
	[StockNew] [float] NOT NULL,
	[QuantityDifference] [float] NOT NULL,
	[BayProduct] [decimal](18, 2) NOT NULL,
	[totalCost] [decimal](18, 2) NOT NULL,
	[StoreID] [int] NOT NULL,
	[UserID] [int] NOT NULL,
 CONSTRAINT [PK_TPL_StockSettlement] PRIMARY KEY CLUSTERED
(
	[ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Statements]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Statements](
	[Statement_id] [int] IDENTITY(1,1) NOT NULL,
	[Emp_id] [int] NOT NULL,
	[Statements_Type] [nvarchar](50) NOT NULL,
	[Statements_TypeDetils] [nvarchar](50) NOT NULL,
	[Amount] [decimal](18, 0) NOT NULL,
	[note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[safe_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[updete_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Statements] PRIMARY KEY CLUSTERED
(
	[Statement_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Shift]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Shift](
	[Shift_Id] [int] IDENTITY(1,1) NOT NULL,
	[UserId] [int] NOT NULL,
	[SafeId] [int] NOT NULL,
	[StartDate] [datetime] NOT NULL,
	[FirstBalance] [decimal](18, 2) NOT NULL,
	[EndDate] [datetime] NULL,
	[LastBalance] [decimal](18, 2) NULL,
	[totalSaels] [decimal](18, 2) NULL,
	[totalRetrnSaels] [decimal](18, 2) NULL,
	[totalPorshes] [decimal](18, 2) NULL,
	[totalRetrnProsh] [decimal](18, 2) NULL,
	[totalSalfeat] [decimal](18, 2) NULL,
	[TotalIncome] [decimal](18, 2) NULL,
	[TotalExprte] [decimal](18, 2) NULL,
 CONSTRAINT [PK_Shift] PRIMARY KEY CLUSTERED
(
	[Shift_Id] DESC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Product_Moves]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Product_Moves](
	[Product_Moves_ID] [int] IDENTITY(1,1) NOT NULL,
	[Product_ID] [int] NOT NULL,
	[Quantity] [float] NOT NULL,
	[BuyPrice] [decimal](18, 2) NULL,
	[SellPrice] [decimal](18, 2) NULL,
	[Profit] [decimal](18, 2) NULL,
	[NumperMove] [int] NULL,
	[user_ID] [int] NULL,
	[InvoiceType] [nvarchar](25) NOT NULL,
	[Carete_Date] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Product_Moves] PRIMARY KEY CLUSTERED
(
	[Product_Moves_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_PermissionScrene]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_PermissionScrene](
	[PermissionID] [int] IDENTITY(1,1) NOT NULL,
	[userID] [int] NULL,
	[NO_Screne] [int] NULL,
	[Srene] [bit] NULL,
	[add_] [bit] NULL,
	[Ediet] [bit] NULL,
	[Delaet] [bit] NULL,
 CONSTRAINT [PK_TPL_PermissionScrene] PRIMARY KEY CLUSTERED
(
	[PermissionID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Permissions_Saels]    Script Date: 08/10/2023 06:52:31 ******/
[SershDelvry] [bit] NULL,
	[ScreneALL] [bit] NULL,
	SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Permissions_Saels](
	[Permissions_Saels_id] [int] IDENTITY(1,1) NOT NULL,
	[User_id] [int] NULL,
	[Passwrd_Selas] [nvarchar](50) NULL,
	[Saels_Leve] [bit] NULL,
	[Saels_Delvery] [bit] NULL,
	[Saels_Agel] [bit] NULL,
	[Descuont_Product] [bit] NULL,
	[Descuont_G] [bit] NULL,
	[ADD_G] [bit] NULL,
	[ADD_M] [bit] NULL,
	[Descount_M] [bit] NULL,
	[Prent_Selas] [bit] NULL,
	[Seals_Count] [int] NULL,
	[bay_Tayp] [bit] NULL,
	[Edite_Saels_Dlevry] [bit] NULL,
	[Done_1_Saels_Delvry] [bit] NULL,
	[Done_ALL_Delvry] [bit] NULL,
	[Cancel_1_Delvry] [bit] NULL,
	[DeleteCode] [bit] NULL,
	[SershSaels] [bit] NULL,
	[TotalSaelsDelvry] [bit] NULL,
	[TotalSaels] [bit] NULL,
	[EditeCostDelvry] [bit] NULL,
 CONSTRAINT [PK_TPL_Permissions_Saels] PRIMARY KEY CLUSTERED
(
	[Permissions_Saels_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Partners]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Partners](
	[PartnersID] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](50) NULL,
	[Fhone] [nvarchar](50) NULL,
	[FromeBalnce] [decimal](18, 2) NULL,
	[nowBalnce] [decimal](18, 2) NULL,
	[percent_store] [decimal](4, 2) NULL,
	[steos] [bit] NULL,
	[note] [nvarchar](max) NULL,
	[userID] [int] NULL,
	[careteDate] [datetime] NULL,
	[PartnersActeve] [bit] NULL,
 CONSTRAINT [PK_TPL_Partners] PRIMARY KEY CLUSTERED
(
	[PartnersID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Offer_Bay]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Offer_Bay](
	[Offer_Bay_Id] [int] IDENTITY(1,1) NOT NULL,
	[FromTotal] [decimal](12, 2) NOT NULL,
	[ToTotal] [decimal](12, 2) NOT NULL,
	[FromDate] [datetime] NOT NULL,
	[ToDate] [datetime] NOT NULL,
	[Discount] [decimal](7, 2) NOT NULL,
	[userId] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Offer_Bay] PRIMARY KEY CLUSTERED
(
	[Offer_Bay_Id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_MovementBalance]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_MovementBalance](
	[Con_id] [int] IDENTITY(1,1) NOT NULL,
	[from_safe_id] [int] NOT NULL,
	[to_safe_id] [int] NOT NULL,
	[balance_frome] [decimal](18, 0) NOT NULL,
	[balance_To] [decimal](18, 0) NOT NULL,
	[balance_frome_after] [decimal](18, 0) NOT NULL,
	[balance_To_after] [decimal](18, 0) NOT NULL,
	[balance_convert] [decimal](18, 0) NOT NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_MovementBalance] PRIMARY KEY CLUSTERED
(
	[Con_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Move_Partners]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Move_Partners](
	[Move_PartnersID] [int] IDENTITY(1,1) NOT NULL,
	[PartnersID] [int] NULL,
	[StetMove] [nvarchar](50) NULL,
	[FromeBalncce] [decimal](18, 2) NULL,
	[endBalance] [decimal](18, 2) NULL,
	[moveBalnce] [decimal](18, 2) NULL,
	[note] [nvarchar](max) NULL,
	[userID] [int] NULL,
	[safeID] [int] NULL,
	[careteDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_Move_Partners] PRIMARY KEY CLUSTERED
(
	[Move_PartnersID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_incomeTypes]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_incomeTypes](
	[incomeT_id] [int] IDENTITY(1,1) NOT NULL,
	[incT_name] [nvarchar](50) NOT NULL,
	[incT_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[incT_acteve] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_incomeTypes] PRIMARY KEY CLUSTERED
(
	[incomeT_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_income]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_income](
	[income_id] [int] IDENTITY(1,1) NOT NULL,
	[incomeTid] [int] NOT NULL,
	[income_Amount] [decimal](18, 0) NOT NULL,
	[income_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[income_acteve] [bit] NOT NULL,
	[Safe_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_income] PRIMARY KEY CLUSTERED
(
	[income_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_ExpensesTypes]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_ExpensesTypes](
	[ExpensesT_id] [int] IDENTITY(1,1) NOT NULL,
	[Exp_name] [nvarchar](50) NOT NULL,
	[Exp_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Exp_Acteve] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_ExpensesTypes] PRIMARY KEY CLUSTERED
(
	[ExpensesT_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Expenses]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Expenses](
	[Expenses_id] [int] IDENTITY(1,1) NOT NULL,
	[ExpT_id] [int] NOT NULL,
	[Exp_Amount] [decimal](18, 0) NOT NULL,
	[Exps_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[Expenses_acteve] [bit] NOT NULL,
	[safe_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Expenses] PRIMARY KEY CLUSTERED
(
	[Expenses_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Erolment_Emp]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Erolment_Emp](
	[eroment_id] [int] IDENTITY(1,1) NOT NULL,
	[jop_id] [int] NOT NULL,
	[emp_name] [nvarchar](50) NOT NULL,
	[emp_fhone] [nvarchar](50) NOT NULL,
	[emp_note] [nvarchar](max) NOT NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_Erolment_Emp] PRIMARY KEY CLUSTERED
(
	[eroment_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Damage]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Damage](
	[DamageId] [int] IDENTITY(1,1) NOT NULL,
	[ProductDetailsId] [int] NOT NULL,
	[DamageQuantity] [float] NOT NULL,
	[BuyPrice] [decimal](12, 2) NOT NULL,
	[DamageDate] [datetime] NOT NULL,
	[DamageNotes] [nvarchar](350) NULL,
	[DamageCost] [decimal](12, 2) NOT NULL,
	[UserId] [int] NOT NULL,
	[StoreId] [int] NULL,
 CONSTRAINT [PK_TbTPL_Damage] PRIMARY KEY CLUSTERED
(
	[DamageId] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_banks]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_banks](
	[banks_id] [int] IDENTITY(1,1) NOT NULL,
	[banks_name] [nvarchar](50) NOT NULL,
	[banksNamper] [nvarchar](50) NULL,
	[name_branch] [nvarchar](50) NULL,
	[discount] [decimal](18, 0) NULL,
	[balanceNow] [decimal](18, 0) NOT NULL,
	[banks_note] [nvarchar](max) NULL,
	[user_id] [int] NOT NULL,
	[banks_Acteve] [bit] NOT NULL,
	[caret_data] [datetime] NOT NULL,
	[ubdet_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_banks] PRIMARY KEY CLUSTERED
(
	[banks_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_MovementBank]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_MovementBank](
	[bank_id] [int] IDENTITY(1,1) NOT NULL,
	[from_bank_id] [int] NOT NULL,
	[to_bank_id] [int] NOT NULL,
	[balance_frome] [decimal](18, 2) NOT NULL,
	[balance_To] [decimal](18, 2) NOT NULL,
	[balance_frome_after] [decimal](18, 2) NOT NULL,
	[balance_To_after] [decimal](18, 2) NOT NULL,
	[balance_convert] [decimal](18, 2) NOT NULL,
	[user_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_MovementBank] PRIMARY KEY CLUSTERED
(
	[bank_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Attendance]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Attendance](
	[Attendance_id] [int] IDENTITY(1,1) NOT NULL,
	[Emp_id] [int] NOT NULL,
	[start_time] [datetime] NOT NULL,
	[end_time] [datetime] NULL,
	[user_id_start] [int] NOT NULL,
	[user_id_End] [int] NULL,
	[Total_hour] [nvarchar](15) NULL,
 CONSTRAINT [PK_TPL_Attendance] PRIMARY KEY CLUSTERED
(
	[Attendance_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_ADD_Slider]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_ADD_Slider](
	[SliderID] [int] IDENTITY(1,1) NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Image] [image] NOT NULL,
	[active] [bit] NULL,
	[userID] [int] NOT NULL,
	[cartedate] [datetime] NULL,
	[updatedDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_ADD_Slider] PRIMARY KEY CLUSTERED
(
	[SliderID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Notifictions]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Notifictions](
	[notifictionsID] [int] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](50) NULL,
	[body] [nvarchar](500) NULL,
	[image] [image] NULL,
	[ClaintID] [int] NULL,
	[results] [nvarchar](50) NULL,
	[User_ID] [int] NULL,
	[createdDate] [datetime] NULL,
	[updatedDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_Notifictions] PRIMARY KEY CLUSTERED
(
	[notifictionsID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Deferreds]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Deferreds](
	[Deferreds_ID] [int] IDENTITY(1,1) NOT NULL,
	[ClaintID] [int] NULL,
	[Acteve] [bit] NULL,
	[careatedDate] [datetime] NULL,
	[ubdaetDate] [datetime] NULL,
 CONSTRAINT [PK_TPL_Deferreds] PRIMARY KEY CLUSTERED
(
	[Deferreds_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_ClientPayments]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_ClientPayments](
	[PaymentsCle_id] [int] IDENTITY(1,1) NOT NULL,
	[ClientPay_Id] [int] NOT NULL,
	[FromeAmount] [decimal](18, 2) NOT NULL,
	[PaidAmount] [decimal](18, 2) NOT NULL,
	[NewAmount] [decimal](18, 2) NOT NULL,
	[Pay_note] [nvarchar](max) NULL,
	[Payment_method] [nvarchar](15) NOT NULL,
	[user_id] [int] NOT NULL,
	[safe_id] [int] NOT NULL,
	[caret_data] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_ClientPayments] PRIMARY KEY CLUSTERED
(
	[PaymentsCle_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_CategoryAPP]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_CategoryAPP](
	[CategoryAPP_ID] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](50) NOT NULL,
	[image] [image] NOT NULL,
	[note] [nvarchar](250) NOT NULL,
	[userID] [int] NOT NULL,
	[CAT_Acteve] [bit] NULL,
	[cartedate] [datetime] NOT NULL,
	[updetedate] [datetime] NOT NULL,
 CONSTRAINT [PK_TPL_CategoryAPP] PRIMARY KEY CLUSTERED
(
	[CategoryAPP_ID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_pricing]    Script Date: 08/10/2023 06:52:31 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_pricing](
	[pricing_id] [int] IDENTITY(1,1) NOT NULL,
	[pricing_name] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_TPL_pricing] PRIMARY KEY CLUSTERED
(
	[pricing_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_Country]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_Country](
	[Country_id] [int] IDENTITY(1,1) NOT NULL,
	[Country_name] [nvarchar](50) NOT NULL,
	[Country_Active] [bit] NULL,
	[caret_data] [datetime] NULL,
	[updete_data] [datetime] NULL,
 CONSTRAINT [PK_TPL_Country] PRIMARY KEY CLUSTERED
(
	[Country_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[TPL_City]    Script Date: 08/10/2023 06:52:30 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[TPL_City](
	[City_id] [int] IDENTITY(1,1) NOT NULL,
	[City_name] [nvarchar](50) NOT NULL,
	[Country_id] [int] NOT NULL,
	[City_Active] [bit] NOT NULL,
	[user_id] [int] NULL,
	[caret_data] [datetime] NULL,
	[updete_data] [datetime] NULL,
 CONSTRAINT [PK_TPL_City] PRIMARY KEY CLUSTERED
(
	[City_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  ForeignKey [FK_TPL_ADD_Slider_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_ADD_Slider]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ADD_Slider_TPL_Users] FOREIGN KEY([userID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_ADD_Slider] CHECK CONSTRAINT [FK_TPL_ADD_Slider_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Attendance_TPL_Employees]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Attendance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Attendance_TPL_Employees] FOREIGN KEY([Emp_id])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_Attendance] CHECK CONSTRAINT [FK_TPL_Attendance_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_Attendance_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Attendance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Attendance_TPL_Users] FOREIGN KEY([user_id_start])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Attendance] CHECK CONSTRAINT [FK_TPL_Attendance_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Attendance_TPL_Users1]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Attendance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Attendance_TPL_Users1] FOREIGN KEY([user_id_End])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Attendance] CHECK CONSTRAINT [FK_TPL_Attendance_TPL_Users1]
GO
/****** Object:  ForeignKey [FK_TPL_banks_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_banks]  WITH CHECK ADD  CONSTRAINT [FK_TPL_banks_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_banks] CHECK CONSTRAINT [FK_TPL_banks_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Branch_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Branch]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Branch_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Branch] CHECK CONSTRAINT [FK_TPL_Branch_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Category_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Category]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Category_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Category] CHECK CONSTRAINT [FK_TPL_Category_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_City_TPL_Country]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_City]  WITH CHECK ADD  CONSTRAINT [FK_TPL_City_TPL_Country] FOREIGN KEY([Country_id])
REFERENCES [dbo].[TPL_Country] ([Country_id])
GO
ALTER TABLE [dbo].[TPL_City] CHECK CONSTRAINT [FK_TPL_City_TPL_Country]
GO
/****** Object:  ForeignKey [FK_TPL_City_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_City]  WITH CHECK ADD  CONSTRAINT [FK_TPL_City_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_City] CHECK CONSTRAINT [FK_TPL_City_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Client_TPL_Region]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Client]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Client_TPL_Region] FOREIGN KEY([Region_id])
REFERENCES [dbo].[TPL_Region] ([Region_id])
GO
ALTER TABLE [dbo].[TPL_Client] CHECK CONSTRAINT [FK_TPL_Client_TPL_Region]
GO
/****** Object:  ForeignKey [FK_TPL_Client_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Client]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Client_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Client] CHECK CONSTRAINT [FK_TPL_Client_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_ClientPayments_TPL_Client]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_ClientPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ClientPayments_TPL_Client] FOREIGN KEY([ClientPay_Id])
REFERENCES [dbo].[TPL_Client] ([Client_id])
GO
ALTER TABLE [dbo].[TPL_ClientPayments] CHECK CONSTRAINT [FK_TPL_ClientPayments_TPL_Client]
GO
/****** Object:  ForeignKey [FK_TPL_ClientPayments_TPL_Safe]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_ClientPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ClientPayments_TPL_Safe] FOREIGN KEY([safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_ClientPayments] CHECK CONSTRAINT [FK_TPL_ClientPayments_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_ClientPayments_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_ClientPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ClientPayments_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_ClientPayments] CHECK CONSTRAINT [FK_TPL_ClientPayments_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Damage_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Damage]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Damage_TPL_ProductDetails] FOREIGN KEY([ProductDetailsId])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_Damage] CHECK CONSTRAINT [FK_TPL_Damage_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_Damage_TPL_Store]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Damage]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Damage_TPL_Store] FOREIGN KEY([StoreId])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_Damage] CHECK CONSTRAINT [FK_TPL_Damage_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_Damage_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Damage]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Damage_TPL_Users] FOREIGN KEY([UserId])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Damage] CHECK CONSTRAINT [FK_TPL_Damage_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Deferreds_TPL_Client]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Deferreds]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Deferreds_TPL_Client] FOREIGN KEY([ClaintID])
REFERENCES [dbo].[TPL_Client] ([Client_id])
GO
ALTER TABLE [dbo].[TPL_Deferreds] CHECK CONSTRAINT [FK_TPL_Deferreds_TPL_Client]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryDetails_TPL_DeliveryHeader]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryDetails_TPL_DeliveryHeader] FOREIGN KEY([SalesHeader_ID])
REFERENCES [dbo].[TPL_DeliveryHeader] ([SalesHeader_ID])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[TPL_DeliveryDetails] CHECK CONSTRAINT [FK_TPL_DeliveryDetails_TPL_DeliveryHeader]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryDetails_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryDetails_TPL_ProductDetails] FOREIGN KEY([ProductDetails_ID])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_DeliveryDetails] CHECK CONSTRAINT [FK_TPL_DeliveryDetails_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Client]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Client] FOREIGN KEY([Client_ID])
REFERENCES [dbo].[TPL_Client] ([Client_id])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Client]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Comment]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Comment] FOREIGN KEY([coupon_id])
REFERENCES [dbo].[TPL_PrmoCode] ([PrmoCode_ID])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Comment]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Employees]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Employees] FOREIGN KEY([Employ_ID])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Safe]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Safe] FOREIGN KEY([Safe_ID])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Store]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Store] FOREIGN KEY([Store_ID])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_DeliveryHeader_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_DeliveryHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Users] FOREIGN KEY([User_ID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_DeliveryHeader] CHECK CONSTRAINT [FK_TPL_DeliveryHeader_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Employees_TPL_Branch]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Employees]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Employees_TPL_Branch] FOREIGN KEY([Branch_id])
REFERENCES [dbo].[TPL_Branch] ([Branch_id])
GO
ALTER TABLE [dbo].[TPL_Employees] CHECK CONSTRAINT [FK_TPL_Employees_TPL_Branch]
GO
/****** Object:  ForeignKey [FK_TPL_Employees_TPL_jobs]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Employees]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Employees_TPL_jobs] FOREIGN KEY([jobs_id])
REFERENCES [dbo].[TPL_jobs] ([jobs_id])
GO
ALTER TABLE [dbo].[TPL_Employees] CHECK CONSTRAINT [FK_TPL_Employees_TPL_jobs]
GO
/****** Object:  ForeignKey [FK_TPL_Employees_TPL_PayType]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Employees]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Employees_TPL_PayType] FOREIGN KEY([PayType_id])
REFERENCES [dbo].[TPL_PayType] ([PayType_id])
GO
ALTER TABLE [dbo].[TPL_Employees] CHECK CONSTRAINT [FK_TPL_Employees_TPL_PayType]
GO
/****** Object:  ForeignKey [FK_TPL_Employees_TPL_Region]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Employees]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Employees_TPL_Region] FOREIGN KEY([Region_id])
REFERENCES [dbo].[TPL_Region] ([Region_id])
GO
ALTER TABLE [dbo].[TPL_Employees] CHECK CONSTRAINT [FK_TPL_Employees_TPL_Region]
GO
/****** Object:  ForeignKey [FK_TPL_Employees_TPL_Users]    Script Date: 08/10/2023 06:52:30 ******/
ALTER TABLE [dbo].[TPL_Employees]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Employees_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Employees] CHECK CONSTRAINT [FK_TPL_Employees_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Erolment_Emp_TPL_jobs]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Erolment_Emp]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Erolment_Emp_TPL_jobs] FOREIGN KEY([jop_id])
REFERENCES [dbo].[TPL_jobs] ([jobs_id])
GO
ALTER TABLE [dbo].[TPL_Erolment_Emp] CHECK CONSTRAINT [FK_TPL_Erolment_Emp_TPL_jobs]
GO
/****** Object:  ForeignKey [FK_TPL_Erolment_Emp_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Erolment_Emp]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Erolment_Emp_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Erolment_Emp] CHECK CONSTRAINT [FK_TPL_Erolment_Emp_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Expenses_TPL_ExpensesTypes]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Expenses]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Expenses_TPL_ExpensesTypes] FOREIGN KEY([ExpT_id])
REFERENCES [dbo].[TPL_ExpensesTypes] ([ExpensesT_id])
GO
ALTER TABLE [dbo].[TPL_Expenses] CHECK CONSTRAINT [FK_TPL_Expenses_TPL_ExpensesTypes]
GO
/****** Object:  ForeignKey [FK_TPL_Expenses_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Expenses]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Expenses_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Expenses] CHECK CONSTRAINT [FK_TPL_Expenses_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_ExpensesTypes_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_ExpensesTypes]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ExpensesTypes_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_ExpensesTypes] CHECK CONSTRAINT [FK_TPL_ExpensesTypes_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_income_TPL_incomeTypes]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_income]  WITH CHECK ADD  CONSTRAINT [FK_TPL_income_TPL_incomeTypes] FOREIGN KEY([incomeTid])
REFERENCES [dbo].[TPL_incomeTypes] ([incomeT_id])
GO
ALTER TABLE [dbo].[TPL_income] CHECK CONSTRAINT [FK_TPL_income_TPL_incomeTypes]
GO
/****** Object:  ForeignKey [FK_TPL_income_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_income]  WITH CHECK ADD  CONSTRAINT [FK_TPL_income_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_income] CHECK CONSTRAINT [FK_TPL_income_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_incomeTypes_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_incomeTypes]  WITH CHECK ADD  CONSTRAINT [FK_TPL_incomeTypes_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_incomeTypes] CHECK CONSTRAINT [FK_TPL_incomeTypes_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_jobs_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_jobs]  WITH CHECK ADD  CONSTRAINT [FK_TPL_jobs_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_jobs] CHECK CONSTRAINT [FK_TPL_jobs_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Move_Partners_TPL_Partners]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Move_Partners]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Move_Partners_TPL_Partners] FOREIGN KEY([PartnersID])
REFERENCES [dbo].[TPL_Partners] ([PartnersID])
GO
ALTER TABLE [dbo].[TPL_Move_Partners] CHECK CONSTRAINT [FK_TPL_Move_Partners_TPL_Partners]
GO
/****** Object:  ForeignKey [FK_TPL_Move_Partners_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Move_Partners]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Move_Partners_TPL_Safe] FOREIGN KEY([safeID])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_Move_Partners] CHECK CONSTRAINT [FK_TPL_Move_Partners_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_Move_Partners_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Move_Partners]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Move_Partners_TPL_Users] FOREIGN KEY([userID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Move_Partners] CHECK CONSTRAINT [FK_TPL_Move_Partners_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBalance_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBalance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBalance_TPL_Safe] FOREIGN KEY([from_safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_MovementBalance] CHECK CONSTRAINT [FK_TPL_MovementBalance_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBalance_TPL_Safe1]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBalance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBalance_TPL_Safe1] FOREIGN KEY([to_safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_MovementBalance] CHECK CONSTRAINT [FK_TPL_MovementBalance_TPL_Safe1]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBalance_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBalance]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBalance_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_MovementBalance] CHECK CONSTRAINT [FK_TPL_MovementBalance_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBank_TPL_banks]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBank]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBank_TPL_banks] FOREIGN KEY([from_bank_id])
REFERENCES [dbo].[TPL_banks] ([banks_id])
GO
ALTER TABLE [dbo].[TPL_MovementBank] CHECK CONSTRAINT [FK_TPL_MovementBank_TPL_banks]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBank_TPL_banks1]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBank]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBank_TPL_banks1] FOREIGN KEY([to_bank_id])
REFERENCES [dbo].[TPL_banks] ([banks_id])
GO
ALTER TABLE [dbo].[TPL_MovementBank] CHECK CONSTRAINT [FK_TPL_MovementBank_TPL_banks1]
GO
/****** Object:  ForeignKey [FK_TPL_MovementBank_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementBank]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementBank_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_MovementBank] CHECK CONSTRAINT [FK_TPL_MovementBank_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_MovementStock_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementStock]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementStock_TPL_Users] FOREIGN KEY([UserId])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_MovementStock] CHECK CONSTRAINT [FK_TPL_MovementStock_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_MovementStockDetails_TPL_MovementStock]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementStockDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementStockDetails_TPL_MovementStock] FOREIGN KEY([MovementStockId])
REFERENCES [dbo].[TPL_MovementStock] ([Move_Id])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[TPL_MovementStockDetails] CHECK CONSTRAINT [FK_TPL_MovementStockDetails_TPL_MovementStock]
GO
/****** Object:  ForeignKey [FK_TPL_MovementStockDetails_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_MovementStockDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_MovementStockDetails_TPL_ProductDetails] FOREIGN KEY([ProductDetailsId])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_MovementStockDetails] CHECK CONSTRAINT [FK_TPL_MovementStockDetails_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_Notifictions_TPL_Client]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Notifictions]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Notifictions_TPL_Client] FOREIGN KEY([ClaintID])
REFERENCES [dbo].[TPL_Client] ([Client_id])
GO
ALTER TABLE [dbo].[TPL_Notifictions] CHECK CONSTRAINT [FK_TPL_Notifictions_TPL_Client]
GO
/****** Object:  ForeignKey [FK_TPL_Offer_Bay_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Offer_Bay]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Offer_Bay_TPL_Users] FOREIGN KEY([userId])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Offer_Bay] CHECK CONSTRAINT [FK_TPL_Offer_Bay_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Partners_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Partners]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Partners_TPL_Users] FOREIGN KEY([userID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Partners] CHECK CONSTRAINT [FK_TPL_Partners_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_PayType_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PayType]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PayType_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_PayType] CHECK CONSTRAINT [FK_TPL_PayType_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Permissions_Saels_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Permissions_Saels]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Permissions_Saels_TPL_Users] FOREIGN KEY([User_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Permissions_Saels] CHECK CONSTRAINT [FK_TPL_Permissions_Saels_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_PermissionScrene_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PermissionScrene]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PermissionScrene_TPL_Users] FOREIGN KEY([userID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_PermissionScrene] CHECK CONSTRAINT [FK_TPL_PermissionScrene_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Product_Moves_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Product_Moves]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Product_Moves_TPL_ProductDetails] FOREIGN KEY([Product_ID])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_Product_Moves] CHECK CONSTRAINT [FK_TPL_Product_Moves_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_Product_Moves_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Product_Moves]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Product_Moves_TPL_Users] FOREIGN KEY([user_ID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Product_Moves] CHECK CONSTRAINT [FK_TPL_Product_Moves_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_ProductDetails_TPL_ProductsHeader]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_ProductDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ProductDetails_TPL_ProductsHeader] FOREIGN KEY([Product_id])
REFERENCES [dbo].[TPL_ProductsHeader] ([Products_ID])
GO
ALTER TABLE [dbo].[TPL_ProductDetails] CHECK CONSTRAINT [FK_TPL_ProductDetails_TPL_ProductsHeader]
GO
/****** Object:  ForeignKey [FK_TPL_ProductDetails_TPL_Unit]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_ProductDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ProductDetails_TPL_Unit] FOREIGN KEY([ProductsD_unit_id])
REFERENCES [dbo].[TPL_Unit] ([unit_id])
GO
ALTER TABLE [dbo].[TPL_ProductDetails] CHECK CONSTRAINT [FK_TPL_ProductDetails_TPL_Unit]
GO
/****** Object:  ForeignKey [FK_TPL_ProductsHeader_TPL_Category]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_ProductsHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ProductsHeader_TPL_Category] FOREIGN KEY([Products_Sup_id])
REFERENCES [dbo].[TPL_Category] ([Category_id])
GO
ALTER TABLE [dbo].[TPL_ProductsHeader] CHECK CONSTRAINT [FK_TPL_ProductsHeader_TPL_Category]
GO
/****** Object:  ForeignKey [FK_TPL_ProductsHeader_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_ProductsHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_ProductsHeader_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_ProductsHeader] CHECK CONSTRAINT [FK_TPL_ProductsHeader_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseDetails_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseDetails_TPL_ProductDetails] FOREIGN KEY([Product_Details_Id])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_PurchaseDetails] CHECK CONSTRAINT [FK_TPL_PurchaseDetails_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseDetails_TPL_PurchaseHeader]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseDetails_TPL_PurchaseHeader] FOREIGN KEY([Purchase_H_id])
REFERENCES [dbo].[TPL_PurchaseHeader] ([PurchaseH_id])
GO
ALTER TABLE [dbo].[TPL_PurchaseDetails] CHECK CONSTRAINT [FK_TPL_PurchaseDetails_TPL_PurchaseHeader]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseHeader_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Safe] FOREIGN KEY([Safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_PurchaseHeader] CHECK CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseHeader_TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Store] FOREIGN KEY([Store_id])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_PurchaseHeader] CHECK CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseHeader_TPL_Supplier]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Supplier] FOREIGN KEY([Suppliers_id])
REFERENCES [dbo].[TPL_Supplier] ([Supplier_id])
GO
ALTER TABLE [dbo].[TPL_PurchaseHeader] CHECK CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Supplier]
GO
/****** Object:  ForeignKey [FK_TPL_PurchaseHeader_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_PurchaseHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Users] FOREIGN KEY([uoser_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_PurchaseHeader] CHECK CONSTRAINT [FK_TPL_PurchaseHeader_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Region_TPL_City]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Region]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Region_TPL_City] FOREIGN KEY([City_id])
REFERENCES [dbo].[TPL_City] ([City_id])
GO
ALTER TABLE [dbo].[TPL_Region] CHECK CONSTRAINT [FK_TPL_Region_TPL_City]
GO
/****** Object:  ForeignKey [FK_TPL_Region_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Region]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Region_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Region] CHECK CONSTRAINT [FK_TPL_Region_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Safe_TPL_Branch]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Safe]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Safe_TPL_Branch] FOREIGN KEY([bransh_id])
REFERENCES [dbo].[TPL_Branch] ([Branch_id])
GO
ALTER TABLE [dbo].[TPL_Safe] CHECK CONSTRAINT [FK_TPL_Safe_TPL_Branch]
GO
/****** Object:  ForeignKey [FK_TPL_Safe_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Safe]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Safe_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Safe] CHECK CONSTRAINT [FK_TPL_Safe_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_SalesDetails_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesDetails_TPL_ProductDetails] FOREIGN KEY([ProductDetails_ID])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_SalesDetails] CHECK CONSTRAINT [FK_TPL_SalesDetails_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_SalesDetails_TPL_SalesHeader]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesDetails]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesDetails_TPL_SalesHeader] FOREIGN KEY([SalesHeader_ID])
REFERENCES [dbo].[TPL_SalesHeader] ([SalesHeader_ID])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[TPL_SalesDetails] CHECK CONSTRAINT [FK_TPL_SalesDetails_TPL_SalesHeader]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Client]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Client] FOREIGN KEY([Client_ID])
REFERENCES [dbo].[TPL_Client] ([Client_id])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Client]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Comment]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Comment] FOREIGN KEY([comment_ID])
REFERENCES [dbo].[TPL_Comment] ([commentID])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Comment]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Employees]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Employees] FOREIGN KEY([Employ_ID])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_PrmoCode]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_PrmoCode] FOREIGN KEY([coupon_id])
REFERENCES [dbo].[TPL_PrmoCode] ([PrmoCode_ID])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_PrmoCode]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Safe] FOREIGN KEY([Safe_ID])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Store] FOREIGN KEY([Store_ID])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_SalesHeader_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SalesHeader]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SalesHeader_TPL_Users] FOREIGN KEY([User_ID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_SalesHeader] CHECK CONSTRAINT [FK_TPL_SalesHeader_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_SecondOffer_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SecondOffer]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SecondOffer_TPL_ProductDetails] FOREIGN KEY([ProductDetailsId])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_SecondOffer] CHECK CONSTRAINT [FK_TPL_SecondOffer_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_Setting_TPL_Region]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Setting]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Setting_TPL_Region] FOREIGN KEY([Region])
REFERENCES [dbo].[TPL_Region] ([Region_id])
GO
ALTER TABLE [dbo].[TPL_Setting] CHECK CONSTRAINT [FK_TPL_Setting_TPL_Region]
GO
/****** Object:  ForeignKey [FK_TPL_Setting_TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Setting]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Setting_TPL_Store] FOREIGN KEY([Store_id])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_Setting] CHECK CONSTRAINT [FK_TPL_Setting_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_Shift_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Shift]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Shift_TPL_Safe] FOREIGN KEY([SafeId])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_Shift] CHECK CONSTRAINT [FK_TPL_Shift_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_Shift_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Shift]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Shift_TPL_Users] FOREIGN KEY([UserId])
REFERENCES [dbo].[TPL_Users] ([id_user])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[TPL_Shift] CHECK CONSTRAINT [FK_TPL_Shift_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Statements_TPL_Employees]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Statements]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Statements_TPL_Employees] FOREIGN KEY([Emp_id])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_Statements] CHECK CONSTRAINT [FK_TPL_Statements_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_Statements_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Statements]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Statements_TPL_Safe] FOREIGN KEY([safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_Statements] CHECK CONSTRAINT [FK_TPL_Statements_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_Statements_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Statements]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Statements_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Statements] CHECK CONSTRAINT [FK_TPL_Statements_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Stock_TPL_ProductsHeader]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Stock]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Stock_TPL_ProductsHeader] FOREIGN KEY([Product_Id])
REFERENCES [dbo].[TPL_ProductsHeader] ([Products_ID])
GO
ALTER TABLE [dbo].[TPL_Stock] CHECK CONSTRAINT [FK_TPL_Stock_TPL_ProductsHeader]
GO
/****** Object:  ForeignKey [FK_TPL_Stock_TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Stock]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Stock_TPL_Store] FOREIGN KEY([Store_id])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_Stock] CHECK CONSTRAINT [FK_TPL_Stock_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_StockSettlement_TPL_ProductDetails]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_StockSettlement]  WITH CHECK ADD  CONSTRAINT [FK_TPL_StockSettlement_TPL_ProductDetails] FOREIGN KEY([ProductDetailsId])
REFERENCES [dbo].[TPL_ProductDetails] ([ProductD_id])
GO
ALTER TABLE [dbo].[TPL_StockSettlement] CHECK CONSTRAINT [FK_TPL_StockSettlement_TPL_ProductDetails]
GO
/****** Object:  ForeignKey [FK_TPL_StockSettlement_TPL_Store]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_StockSettlement]  WITH CHECK ADD  CONSTRAINT [FK_TPL_StockSettlement_TPL_Store] FOREIGN KEY([StoreID])
REFERENCES [dbo].[TPL_Store] ([Store_id])
GO
ALTER TABLE [dbo].[TPL_StockSettlement] CHECK CONSTRAINT [FK_TPL_StockSettlement_TPL_Store]
GO
/****** Object:  ForeignKey [FK_TPL_StockSettlement_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_StockSettlement]  WITH CHECK ADD  CONSTRAINT [FK_TPL_StockSettlement_TPL_Users] FOREIGN KEY([UserID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_StockSettlement] CHECK CONSTRAINT [FK_TPL_StockSettlement_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Store_TPL_Branch]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Store]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Store_TPL_Branch] FOREIGN KEY([Branch_id])
REFERENCES [dbo].[TPL_Branch] ([Branch_id])
GO
ALTER TABLE [dbo].[TPL_Store] CHECK CONSTRAINT [FK_TPL_Store_TPL_Branch]
GO
/****** Object:  ForeignKey [FK_TPL_Store_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Store]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Store_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Store] CHECK CONSTRAINT [FK_TPL_Store_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Supplier_TPL_Region]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Supplier]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Supplier_TPL_Region] FOREIGN KEY([Region_id])
REFERENCES [dbo].[TPL_Region] ([Region_id])
GO
ALTER TABLE [dbo].[TPL_Supplier] CHECK CONSTRAINT [FK_TPL_Supplier_TPL_Region]
GO
/****** Object:  ForeignKey [FK_TPL_Supplier_TPL_Supplier_Grup]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Supplier]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Supplier_TPL_Supplier_Grup] FOREIGN KEY([Grup_id])
REFERENCES [dbo].[TPL_Supplier_Grup] ([SupplierGrup_id])
GO
ALTER TABLE [dbo].[TPL_Supplier] CHECK CONSTRAINT [FK_TPL_Supplier_TPL_Supplier_Grup]
GO
/****** Object:  ForeignKey [FK_TPL_Supplier_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Supplier]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Supplier_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Supplier] CHECK CONSTRAINT [FK_TPL_Supplier_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Supplier_Grup_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Supplier_Grup]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Supplier_Grup_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Supplier_Grup] CHECK CONSTRAINT [FK_TPL_Supplier_Grup_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_SupplierPayments_TPL_Safe]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SupplierPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SupplierPayments_TPL_Safe] FOREIGN KEY([safe_id])
REFERENCES [dbo].[TPL_Safe] ([safe_id])
GO
ALTER TABLE [dbo].[TPL_SupplierPayments] CHECK CONSTRAINT [FK_TPL_SupplierPayments_TPL_Safe]
GO
/****** Object:  ForeignKey [FK_TPL_SupplierPayments_TPL_Supplier]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SupplierPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SupplierPayments_TPL_Supplier] FOREIGN KEY([SupplierPay_Id])
REFERENCES [dbo].[TPL_Supplier] ([Supplier_id])
GO
ALTER TABLE [dbo].[TPL_SupplierPayments] CHECK CONSTRAINT [FK_TPL_SupplierPayments_TPL_Supplier]
GO
/****** Object:  ForeignKey [FK_TPL_SupplierPayments_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_SupplierPayments]  WITH CHECK ADD  CONSTRAINT [FK_TPL_SupplierPayments_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_SupplierPayments] CHECK CONSTRAINT [FK_TPL_SupplierPayments_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Unit_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Unit]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Unit_TPL_Users] FOREIGN KEY([user_id])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_Unit] CHECK CONSTRAINT [FK_TPL_Unit_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_User_Delivry_TPL_Employees]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_User_Delivry]  WITH CHECK ADD  CONSTRAINT [FK_TPL_User_Delivry_TPL_Employees] FOREIGN KEY([EmpID])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_User_Delivry] CHECK CONSTRAINT [FK_TPL_User_Delivry_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_User_Delivry_TPL_Users]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_User_Delivry]  WITH CHECK ADD  CONSTRAINT [FK_TPL_User_Delivry_TPL_Users] FOREIGN KEY([userID])
REFERENCES [dbo].[TPL_Users] ([id_user])
GO
ALTER TABLE [dbo].[TPL_User_Delivry] CHECK CONSTRAINT [FK_TPL_User_Delivry_TPL_Users]
GO
/****** Object:  ForeignKey [FK_TPL_Users_TPL_Employees]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Users]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Users_TPL_Employees] FOREIGN KEY([user_Emp_id])
REFERENCES [dbo].[TPL_Employees] ([Employees_id])
GO
ALTER TABLE [dbo].[TPL_Users] CHECK CONSTRAINT [FK_TPL_Users_TPL_Employees]
GO
/****** Object:  ForeignKey [FK_TPL_Users_TPL_User_Type]    Script Date: 08/10/2023 06:52:31 ******/
ALTER TABLE [dbo].[TPL_Users]  WITH CHECK ADD  CONSTRAINT [FK_TPL_Users_TPL_User_Type] FOREIGN KEY([user_Type])
REFERENCES [dbo].[TPL_User_Type] ([UType_id])
GO
ALTER TABLE [dbo].[TPL_Users] CHECK CONSTRAINT [FK_TPL_Users_TPL_User_Type]
GO
